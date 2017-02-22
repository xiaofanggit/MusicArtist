<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAUserCanBeFoundByUserName()
    {
        $user = App\User::findByUserName('johndoe1');

        $this->assertEquals($user['name'], 'johndoe1');
    }
}
