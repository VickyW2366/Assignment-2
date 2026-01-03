<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function index()
{
    return view('auth.login');
}
function login(Request $request)
{
    $userDetails = [
        "email" => $request->email,
        "password" => $request->password
    ];
    $userDetailsVal = $request->validate([
        'email'=>['required'],
        'password'=>['required']
    ],[//A custom error message for if the username/password fields are not not interacted with
        'email.required' => 'Please input your email address.',
        'password.required' => 'Please input your password.'
        ]);
// Attempts to log in using the given email and password
    if (Auth::attempt($userDetails)) {
        $request->session()->regenerate();
        return redirect('/buses');
    } else {
        return back()->withInput()->withMessage('Your email address or password is incorrect.');
    }
    return back();
}
function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
}
}
