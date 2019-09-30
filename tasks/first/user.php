<?php

class User extends Common {

    public function __construct($db)
    {
        parent::__construct($db);
    }

    public function getName()
    {
        return self::$user['name'];
    }
    public function getId()
    {
        return self::$user['id'];
    }
}