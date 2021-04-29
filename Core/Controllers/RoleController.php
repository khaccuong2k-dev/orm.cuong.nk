<?php

namespace Core\Controllers;

use Core\Models\Role;

class RoleController
{
    public function __construct()
    {
        $roles = new Role();
    }

    public function getAllRole()
    {
        return $roles = Role::where('id',1);
    }
}