<?php

namespace Core\Controllers;

use Core\Models\User;
class UserController
{
    public function __construct()
    {
        $users = new User();
    }

    public function getUserById()
    {
        return User::all(2);
    }
    public function getAllWhereRequest()
    {
        $users = User::where('id', '=', 6)->orWhere('id', '=', '1')->get();
        return $users;
    }
}
