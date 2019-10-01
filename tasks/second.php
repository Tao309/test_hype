<?php

$sql = '
SELECT *
FROM users
ORDER BY id
';

$users = $db->findAll($sql);


$emailsArray = [];

foreach($users as $row)
{
    if(empty($row['email']))
    {
        continue;
    }

    $emails = array_unique(explode(',',$row['email']));

    foreach($emails as $email)
    {
        if(!isset($emailsArray[$email]))
        {
            $emailsArray[$email] = [
                'count' => 0,
                'users' => [],
            ];
        }

        $emailsArray[$email]['count']++;
        $emailsArray[$email]['users'][] = [
            'id' => $row['id'],
            'name' => $row['name'],
        ];

    }
}

/**
 * Вариант сделать общий проход и записать в кэш.
 * После изменения каждой модели юзера, вносить изменения в кэш общего списка
 */


print_r($emailsArray);