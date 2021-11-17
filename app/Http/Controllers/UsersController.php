<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use \App\Http\Resources\UsersResource;

class UsersController extends Controller
{
    public function all (){
        $users = User::all();

        return $users->toArray(); // returns json
        // return all users

    }

    public function store(Request $request)
    {

        $user = User::create([
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),

        ]);

        return new UsersResource($user);
    }

    public function show(User $user)
    {
        return $user->role;
    }

     public function index()
    {
        return UsersResource::collection(User::all());
    }

     public function destroy(User $user)
    {
         $user->delete();
        return response(null, 204);
    }
}
