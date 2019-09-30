<?php

class Category extends Common {

    public function __construct($db)
    {
        parent::__construct($db);
    }

    public function getCats()
    {
        $sql = '
        SELECT category.id, category.name
        FROM category
        ORDER BY category.name
        ';

        return $this->renderCats($this->db->findAll($sql));
    }
    private function getLink($id = null)
    {
        if($id)
        {
            return self::$link.'&cat='.$id;
        }

        return self::$link;
    }

    private function renderCats($rows = [])
    {
        if(empty($rows))
        {
            return null;
        }

        $data = '<div id="catsMenu">';

        $class = $this->currentCat ? '' : 'current';
        $data .= '<div class="'.$class.'">';
        $data .= '<a href="'.$this->getLink().'">Все</a>';
        $data .= '</div>';

        foreach($rows as $row)
        {
            $class = $this->currentCat && $this->currentCat == $row['id'] ? 'current' : '';

            $data .= '<div class="'.$class.'">';
            $data .= '<a href="'.$this->getLink($row['id']).'">'.$row['name'].'</a>';
            $data .= '</div>';
        }

        $data .= '</div>';

        return $data;
    }
}