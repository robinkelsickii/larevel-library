<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function all (){
        $users = User::all();

        return $users->toArray(); // returns json
        // return all users

    }
}
