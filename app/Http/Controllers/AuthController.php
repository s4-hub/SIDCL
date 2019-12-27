<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auths.login');
    }

    public function postlogin(Request $request)
    {
        //dd($request);
        if(Auth::attempt($request->only('email', 'password'))){
            if(auth()->user()->aktif == "Y"){
            return redirect('/dashboard');
            }
            return redirect('/login')->with('error','Akun anda diblok');
        }
        return redirect('/login')->with('error','Username dan Password tidak sesuai');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
