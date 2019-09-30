<?php
abstract class Common {
    /**
     * @var DB
     */
    protected $db;

    protected static $link = ROOT.'?task=first';

    protected $currentCat;
    protected static $user;
    protected $errorMessage;

    public function __construct($db)
    {
        if(is_null($this->db))
        {
            $this->db =  $db;
        }

        if(isset($_GET['cat']))
        {
            $this->currentCat = (int)$_GET['cat'];
        }

        if(is_null(self::$user))
        {
            $sql = '
            SELECT *
            FROM user 
            ORDER BY rand()
            LIMIT 1
            ';
            self::$user = $this->db->find($sql);
        }
    }


    public function getErrorMessage()
    {
        return $this->errorMessage;
    }
    public function setErrorMessage($message)
    {
        return $this->errorMessage = $message;
    }
}