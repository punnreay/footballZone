<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class UserController extends Controller
{
    //show Register create form
    public function create()
    {
        return view('users.register');
    }

    // create new user

    public function store(Request $request)
    {
        $formFields = $request->validate(
            [
                'name' => ['required', 'min:3'],
                'email' => ['required', 'email'],
                'password' => 'required|confirmed|min:6'
            ]
        );
        // hash password
        $formFields['password'] = bcrypt($formFields['password']);

        //create user
        $user = User::create($formFields);

        //Login
        auth()->login($user);

        return redirect('/');
    }
    // user logout
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    //show login form
    public function login()
    {
        return view('users.login');
    }

    // Authenticate User
    public function authenticate(Request $request)
    {
        $formFields = $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => 'required'
            ]
        );
        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/');
        }
        return back();
    }
}
