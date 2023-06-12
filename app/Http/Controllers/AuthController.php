<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(){
        return view('register');
    }

    public function simpan(Request $request){
        User::create([
            'name'=> $request->nama,
            'email'=> $request->email,
            'password'=> bcrypt($request->password)
        ]);
        return redirect('/');
    }
    
    public function login(){
        return view('login');
    }

    public function cekLogin(Request $request){
        if (Auth::attempt([
            'email' => $request->email,
            'password'=>$request->password
        ]))
        {
            return redirect('/home');
        }
        else
        {
        return redirect('/');
        }
    }

    public function logOut(){
        Auth::logout();
        return redirect('/');
    }
}