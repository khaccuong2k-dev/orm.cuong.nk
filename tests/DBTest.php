<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Core\Database\DB;

class DBTest extends TestCase
{
    public function test_connect()
    {
        $connection = new DB();

        $connection ? $this->assertTrue(true) : $this->assertTrue(false);
    }
}
