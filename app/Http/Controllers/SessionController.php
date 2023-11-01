<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function story()
    {
        $attributes = request()->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

//        attempt to authenticate and log in the user
//        based on the provided credentials

        if (!auth()->attempt($attributes)){
            // auth failed
           throw ValidationException::withMessages([
               'email' => 'Your provided credentials could not be verified.'
           ]);

            // OR
//        return back()
//            ->withInput()
//            ->withErrors(['email' => 'Your provided credentials could not be verified.']);

        }

        session()->regenerate();
        return redirect('/')->with('success', 'welcome Back!');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
