<?php

//$url = $_SERVER['SERVER_NAME'];
$url = $_SERVER['SERVER_NAME'].'/test_hype/';

define('ROOT', 'http://'.$url);
define('zROOT', __DIR__);
define('PAGE_BR', '<br/>');

foreach(['DB','tTemplate'] as $file)
{
    require_once(zROOT.'/includes/'.$file.'.php');
}

$db = new DB();

$availableTaskIds = ['first','second','third'];

if(isset($_GET['task']) && !empty($_GET['task']) && in_array($_GET['task'], $availableTaskIds))
{
    $taskId = $_GET['task'];
    $file = './tasks/'.$taskId.'.php';

    if(file_exists($file))
    {
        require_once($file);
        exit;
    }
}

$template = new tTemplate('index');
echo $template->render();