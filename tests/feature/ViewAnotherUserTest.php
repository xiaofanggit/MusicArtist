<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Tweet;

class ViewAnotherUserTest extends TestCase
{
   public function testViewAnotherUserTest()
    {
        $user = App\User::where([
            'name' => 'johndoe1',
            'email' => 'johndoe1@gmail.com',
        ])->first();
        if (empty($user)){
            $user = factory(User::class)->create([
                'name' => 'johndoe1',
                'email' => 'johndoe1@gmail.com',
                'password' => bcrypt('12345')
            ]);
        }
        //$tweet = factory(Tweet::class)->make(['user_id' =>$user->id, 'body' => 'My first tweet']);
        //$user->tweets()->save($tweet);
        $this->visit('/johndoe1')->see('My first tweet');
    }
}
