<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  public function loginForm()
  {
    return view('auth.login');
  }
  public function registerForm()
  {
    return view('auth.register');
  }

  public function login(Request $request){
    $email = $request->email ;
    $password = $request->password;

    $credetials = [
      "email" => $email,
      "password" => $password 
    ];

    if(Auth::attempt($credetials)){
      return redirect()->route("dashboard");
    }
    else {
      return back()->with("error","Try to verify your email or your password !");
    }
  }

  public function register(Request $request)
  {
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->role = 'admin';

    $user->save();

    return redirect()->route("dashboard");
  }

  public function logout() {
    Auth::logout();

    return redirect()->route('login');
  }
}
