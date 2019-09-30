<?php

foreach(['common', 'user', 'post','category'] as $file)
{
    require_once(zROOT.'./tasks/first/'.$file.'.php');
}

$user = new User($db);
$userName = $user->getName();
$userId = $user->getId();

$post = new Post($db);
$category = new Category($db);

$cats = '';

if(isset($_GET['postLikes']))
{
    $id = (int)$_GET['postLikes'];

    $title = 'User Likes For Post #'.$id;
    $content = $post->getLikeUsers($id);
}
else
{
    $title = 'Posts list';
    $cats = $category->getCats();
    $content = $post->getPosts();
}

$template = new tTemplate('first');
$template->replaceVars([
    'title' => $title,
    'cats' => $cats,
    'content' => $content,
    'userName' => $userName,
    'userId' => $userId,
]);
echo $template->render();