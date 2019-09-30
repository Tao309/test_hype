<?php


$sql = '
SELECT *
FROM users
ORDER BY id
';


$users = $db->findAll($sql);

print_r($users);