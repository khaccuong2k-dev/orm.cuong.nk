<?php

namespace Tests;

use Core\Models\User;
use PHPUnit\Framework\TestCase;
class UserControllerTest extends TestCase
{
    public function test_all()
    {
        $users = new User();

        $users = User::all();

        $fakeData = [
            [
                'id' => 1,
                'name' => 'cuong'
            ],
            [
                'id' => 2,
                'name' => 'su'
            ]
        ];

        $this->assertEquals($users, $fakeData);
    }

    public function test_find()
    {
        $users = new User();
        $users = User::find(1);

        $this->assertInstanceOf(User::class, $users);
    }
}