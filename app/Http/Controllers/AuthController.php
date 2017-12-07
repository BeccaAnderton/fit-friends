<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $user = new User;

        $user->name = request()->get('name');
        $user->email = request()->get('email');
        $user->age = request()->get('age');
        $user->postcode = request()->get('postcode');
        $user->bio = request()->get('bio');
        $user->gender = request()->get('gender');
        $user->password = request()->get('password');

        $user->save();

        Auth::login($user);

        return redirect('/');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login()
    {
        $loginAttempt = Auth::attempt([
            'email' => request()->get('email'),
            'password' => request()->get('password')
        ]);

        if ($loginAttempt) {
            return redirect('/');
        }

        return redirect('/login')->withErrors('Your login details are incorrect');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function requestPassword()
    {
        return view('auth.passwords.email');
    }
}
