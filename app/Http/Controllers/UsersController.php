<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function show($name){
        $user = User::findByUserName($name);
        return view('users.show', ['user' => $user]);
    }
}
