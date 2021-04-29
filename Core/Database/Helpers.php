<?php

namespace Core\Database;

use Core\Database\DB;

class Helpers
{
    protected static $db;

    protected static $query = '';

    public function __construct()
    {
        self::$db = new DB();
    }

    public static function all($table = null)
    {
        $listData = self::$db->fetch("SELECT * FROM {$table}");

        return $listData;
    }

    public static function find($table = null, $param = 1)
    {
        $listData = self::$db->fetch("SELECT * FROM {$table} WHERE id = ${param}");

        return $listData;
    }

    public static function where($table = null, $param)
    {
        if (count($param) == 2)
        {
            self::$query = " WHERE {$param[0]} = $param[1]";
        }
        else
        {
            self::$query = " WHERE {$param[0]} {$param[1]} $param[2]";
        }
    }


    public function orWhere($table = null, $param)
    {
        if (count($param) == 2)
        {
            self::$query .= " OR {$param[0]} = $param[1]";
        }
        else
        {
            self::$query .= " OR {$param[0]} {$param[1]} $param[2]";
        }
    }

    public function get($tableName)
    {
        return $query = self::$db->fetch("SELECT * FROM {$tableName} ".self::$query);
    }

    public function belongsTo($nameTableFirst = null, $nameTableSecond = null, $param = null)
    {
        $nameTableSecondRemake = substr($nameTableSecond,0,-1);

        if ($param != null)
        {
            $listData = self::$db->fetch("SELECT t1.*,t2.* FROM {$nameTableFirst} t1 
                                        INNER JOIN {$nameTableSecond} t2 
                                        ON t1.{$nameTableSecondRemake}_id = t2.id
                                        WHERE t1.id = {$param}");

            return $listData;
        }
        else
        {
            $listData = self::$db->fetch("SELECT t1.*,t2.* FROM {$nameTableFirst} t1 
                                        INNER JOIN {$nameTableSecond} t2 
                                        ON t1.{$nameTableSecondRemake}_id = t2.id");

            return $listData;
        }
    }

    public function hasMany($nameTableFirst = null, $nameTableSecond = null, $param = null)
    {
        $nameTableFirstRemake = substr($nameTableFirst,0,-1);

        if ($param != null)
        {
            $listData = self::$db->fetch("SELECT t1.*,t2.* FROM {$nameTableFirst} t1 
                                        INNER JOIN {$nameTableSecond} t2 
                                        ON t1.id = t2.{$nameTableFirstRemake}_id
                                        WHERE t1.id = {$param}");

            return $listData;
        }
        else
        {
            $listData = self::$db->fetch("SELECT t1.*,t2.* FROM {$nameTableFirst} t1 
                                        INNER JOIN {$nameTableSecond} t2 
                                        ON t1.id = t2.{$nameTableFirstRemake}_id");

            return $listData;
        }
    }
}
