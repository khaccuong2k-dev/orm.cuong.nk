<?php


namespace Core\Models;

use Core\Database\Helpers;
use Core\Database\Model;
class User extends Model
{
    public $tableNameModel = 'users';

    public function __construct()
    {
        self::$tableName = $this->tableNameModel;
    }

    public function role($userId = null)
    {
        return $this->belongsTo('users', 'roles', $userId);
    }
}