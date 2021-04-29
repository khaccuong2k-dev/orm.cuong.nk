<?php


namespace Core\Database;

use Core\Database\Helpers;

class Model
{
    protected static $tableName;

    public function __set($name, $value)
    {
        $this->tableName = $value;
    }

    public static function __callStatic($method, $param)
    {
        $helpers = new Helpers;

        switch ($method)
        {
            case 'all' :

                $listData = $helpers->all(self::$tableName);

                return $listData;

            case 'find' :

                $listData = $helpers->find(self::$tableName, $param[0]);

                return $listData;

            case 'where' :

                $listData = $helpers->where(self::$tableName, $param);

                return new static();
        }
    }

    public function __call($method,$param)
    {
        $helpers = new Helpers;

        switch ($method)
        {
            case 'belongsTo' :

                $nameTableFirst = $param[0];

                $nameTableSecond = $param[1];

                $idTable = $param[2];

                $listData = $helpers->belongsTo($nameTableFirst, $nameTableSecond, $idTable);

                return $listData;

            case 'hasMany' :

                $nameTableFirst = $param[0];

                $nameTableSecond = $param[1];

                $idTable = $param[2];

                $listData = $helpers->hasMany($nameTableFirst, $nameTableSecond, $idTable);

                return $listData;

            case 'orWhere' :

                $listData = $helpers->orWhere(self::$tableName, $param);

                return new static();

            case 'get' :

                $listData = $helpers->get(self::$tableName);

                return $listData;
        }
    }
}