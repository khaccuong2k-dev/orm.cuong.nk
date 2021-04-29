<?php


namespace Core\Models;

use Core\Database\Model;
class Role extends Model
{
    public static $tableNameModel = 'roles';

    public function __construct()
    {
        self::$tableName = $this->tableNameModel;
    }

    public function users($id = null)
    {
        return $this->hasMany('roles', 'users', $id);
    }
}