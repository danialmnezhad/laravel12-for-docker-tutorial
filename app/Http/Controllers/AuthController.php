<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function login(){
        return view('login');
    }
    public function authenticate(Request $req){
        if(auth()->check()){
         return redirect()->route('home');   
        }
        $data = $req->only(['email', 'password']);
        if(auth()->attempt($data)){
          $req->session()->regenerate();  
          return redirect()->route('my-images');
        }
        return redirect()->back()->with('failed_authentication_msg', "Your credentials are wrong!");
    }
    public function logout(Request $req){
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerate();
        return redirect()->route('home');
    }
}
