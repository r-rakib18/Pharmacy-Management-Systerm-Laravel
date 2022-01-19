<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function Login()
    {
        return view('login');
    }

    public function loginAction(LoginRequest $loginRequest)
    {
        $credentials = $loginRequest->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('dashboard');
        }
        Session::flash('alert-danger', 'Credentials Not Matched!!');
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
