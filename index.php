<?php


$root = dirname(__FILE__);
$root = str_replace('\\','/',$root);
define('ROOT',$root);
require_once ROOT.'/Core/autoload.php';
use Core\Controllers\UserController;
use Core\Controllers\RoleController;
//use Core\Database\DotEnv;
//(new DotEnv(__DIR__ . '/.env'))->load();

$users = new UserController;
$users = $users->getUserById();
echo '<pre>';
print_r($users);
