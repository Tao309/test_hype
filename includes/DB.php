<?php

class DB
{
    private $db_host = 'localhost';
    private $db_user = 'root';
    private $db_password = '123456';
    private $db_name = 'test_hype';

    /**
     * @var $this->>query DB\connection
     */
    private $query;

    private static $mysql_connect = null;

    public function __construct()
    {
        if (self::$mysql_connect === null) {

            $db_connect = @mysqli_connect($this->db_host, $this->db_user, $this->db_password, $this->db_name);

            if(mysqli_connect_errno($db_connect)) {
                echo 'MySQL connect error!<br/>';
                echo mysqli_connect_errno($db_connect);
                exit;
            }
            else
            {
                mysqli_query($db_connect, "SET NAMES utf8");
                self::$mysql_connect = $db_connect;
            }
        }
    }

    private function query($query = null)
    {
        if($a = @mysqli_query(self::$mysql_connect, $query))
        {
            return $a;
        }
        else
        {
            $e = '<b>Номер ошибки:</b> '.mysqli_errno(self::$mysql_connect).PAGE_BR;
            $e .= '<b>Ошибка:</b> '.PAGE_BR;
            $e .= mysqli_error(self::$mysql_connect).PAGE_BR;
            $e .= '<b>Запрос:</b>'.PAGE_BR;
            $e .= $query;
            die($e);
        }
    }

    public function escape($query = null) {
        return @mysqli_real_escape_string(self::$mysql_connect, $query);
    }

    //Показ всех строк как num
    public function fetchNum($query = null) {
        //return @mysqli_num_rows($query);
        return @mysqli_fetch_all($this->query($query), MYSQLI_NUM);
    }

    //Показ всех строк как assoc
    private function fetch($query = null)
    {
        //return @mysqli_fetch_array($query);
        return @mysqli_fetch_all($this->query($query), MYSQLI_ASSOC);
    }
    private function assoc($query = null)
    {
        return @mysqli_fetch_assoc($this->query($query));
    }
    private function row($query = null)
    {
        return @mysqli_fetch_row($this->query($query));
    }

    //Показ одной строки её первое значение
    public function findColumn($query = null)
    {
        return $this->array($query)[0];
    }
    //Показ одной строки
    public function find($query = null)
    {
        return $this->assoc($query);
    }

    public function findAll($query = null)
    {
        $oneQuery = $this->fetch($query);

        return $oneQuery;
    }

    public function update($query = null)
    {
        return $this->query($query);
    }

    public function delete($query = null)
    {
        return $this->query($query);
    }

    public function insert($query = null)
    {
        return $this->query($query);
    }
}