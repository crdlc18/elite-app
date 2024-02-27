<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthManager extends Controller
{

    function login(){
        if(Auth::check()){
            return redirect(route('dashboard'));
        }
        return view('login');
    }
    function registration(){
        return view('register');
    }

    function loginPost(Request $request){
        $request->validate([
            'username'=> ['required','string'],
            'password'=> 'required'
        ]);
        $credentials=$request->only('username', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('dashboard'));
        }
        return redirect(route('login'))->with('error', 'Login details are not matched');
    }

    function registerPost(Request $request){
        $request->validate([
            'fname'=> ['required','string'],
            'lname'=> ['required','string'],
            'age'=> ['required','int'],
            'gender'=> ['required','string'],
            'username'=> ['required','string', 'unique:'.User::class],
            'email'=> ['required','string', 'email', 'unique:'.User::class],
            'password'=> ['required']
        ]);

        $user = User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'age' => $request->age,
            'gender' => $request->gender,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        if(!$user){
            return redirect(route('register'))->with('error', 'Registration failed. Try again.');
        }

        return redirect(route('login'))->with('success', 'Account created!');
    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
