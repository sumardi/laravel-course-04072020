<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        // $user = User::findOrFail($id); // SELECT * FROM users WHERE id = 1     
        // $name = $user->name;
        // $email = $user->email;

        // return view('profile')->with(['name' => $user->name, 'email' => $email]);
        // return view('profile')->with(compact('name', 'email'));
        return view('profile')->with(compact('user'));
    }
}
