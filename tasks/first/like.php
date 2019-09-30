<?php

if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    exit;
}

require_once('../../includes/DB.php');
require_once('common.php');
require_once('post.php');

$db = new DB();
$post = new Post($db);

$id = $_POST['id'];
$userId = $_POST['userId'];
$click = $_POST['liked'];


$result = $post->setLike($id, $userId, $click);

$data = [
    'message' => !$result ? $post->getErrorMessage(): 'OK',
];

echo json_encode($data);
