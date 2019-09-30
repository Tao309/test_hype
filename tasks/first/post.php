<?php

class Post extends Common{
    public function __construct($db)
    {
        parent::__construct($db);
    }

    public function getPosts()
    {
        $sql = '
        SELECT post.id, post.name,
        category.id AS catId, category.name AS catName,
        link_likes.user_id AS likeUserId
        
        FROM post
        LEFT JOIN link_category_post ON (link_category_post.post_id = post.id)
        LEFT JOIN category ON (category.id = link_category_post.category_id)
        LEFT JOIN link_likes ON (link_likes.post_id = post.id AND link_likes.user_id = '.self::$user['id'].')
        
        ';

        if(!is_null($this->currentCat))
        {
            $sql .= '
            WHERE link_category_post.category_id = '.$this->currentCat.'
            ';
        }

        $sql .= '
        GROUP BY post.id
        ORDER BY post.id DESC';

        return $this->renderPosts($this->db->findAll($sql));
    }
    private function getLikeLink($id = null)
    {
        if($id)
        {
            return self::$link.'&postLikes='.$id;
        }

        return self::$link;
    }

    private function renderPosts($rows = [])
    {
        if(empty($rows))
        {
            return null;
        }

        $data = '<table id="postList">';

        $data .= '<tr>';
        $data .= '<td>ID</td>';
        $data .= '<td>Title</td>';
        $data .= '<td>Like</td>';
        $data .= '<td>Category</td>';
        $data .= '<td>Likes Users list</td>';
        $data .= '</tr>';

        foreach($rows as $row)
        {
            $data .= '<tr>';
            $data .= '<td>';
            $data .= $row['id'];
            $data .= '</td>';
            $data .= '<td>';
            $data .= $row['name'];
            $data .= '</td>';
            $data .= '<td>';

            $class = $row['likeUserId'] ? ' liked' : '';
            $dataLike = ' data-id="'.$row['id'].'" data-liked="'.$row['likeUserId'].'" ';
            $data .= '<span class="like'.$class.'" '.$dataLike.'></span>';

            $data .= '</td>';
            $data .= '<td>';
            $data .= $row['catName'];
            $data .= '</td>';
            $data .= '<td>';
            $data .= '<a href="'.$this->getLikeLink($row['id']).'">Likes</a>';
            $data .= '</td>';
            $data .= '</tr>';
        }
        $data .= '</table>';

        return $data;
    }
    public function getLikeUsers($id)
    {
        $sql = '
        SELECT user.id,user.name
        
        FROM link_likes
        LEFT JOIN user ON (link_likes.user_id = user.id)
        
        WHERE link_likes.post_id = '.$id.'
        ';

        return $this->renderUsers($this->db->findAll($sql));
    }
    private function renderUsers($rows = [])
    {
        if(empty($rows))
        {
            return '1';
        }

        $data = '<table id="userList">';

        $data .= '<tr>';
        $data .= '<td>ID</td>';
        $data .= '<td>Name</td>';
        $data .= '</tr>';

        foreach($rows as $row)
        {
            $data .= '<tr>';
            $data .= '<td>'.$row['id'].'</td>';
            $data .= '<td>'.$row['name'].'</td>';
            $data .= '</tr>';
        }
        $data .= '</table>';

        return $data;
    }

    public function setLike($id, $userId, $click = 0)
    {
        $click = $click ? 0 : 1;

        $sql = '
        SELECT id
        FROM post
        WHERE id = '.$id.'
        LIMIT 1
        ';

        $post = $this->db->find($sql);

        if(!$post)
        {
            $this->setErrorMessage('Post not found');
            return false;
        }

        $sql = '
        SELECT *
        FROM link_likes
        WHERE post_id = '.$id.' AND user_id='.$userId.'
        ';
        $likeRow = $this->db->find($sql);

        if($likeRow)
        {
            if($click)
            {
                $this->setErrorMessage('Post already liked');
                return false;
            }
            else
            {
                $sql = '
                DELETE FROM link_likes
                WHERE post_id = '.$id.' AND user_id='.$userId.'
                ';
                $this->db->delete($sql);

                $this->setErrorMessage('DELETE');
                return false;
            }
        }
        else
        {
            if($click)
            {
                $sql = '
                INSERT INTO link_likes(post_id, user_id)
                VALUES("'.$id.'","'.$userId.'")
                ';
                $this->db->insert($sql);
            }
        }

        return true;
    }
}