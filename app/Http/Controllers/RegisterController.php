<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register/create');
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'name'     => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users,username', // unique:table,column
            'email'    => 'required|email|min:3|max:255|unique:users,email',
            'password' => 'required|min:7|max:255',
        ]);

        User::create($attributes);
        dd('create user');
    }
}
