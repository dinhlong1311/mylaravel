<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
  // login
  public function loginAdmin(Request $request)
  {
    $email = $request['email'];
    $password = $request['password'];
    $admin = ['email'=>$email, 'password'=>$password];

    if(Auth::guard('web_admin')->attempt($admin)) {
      return redirect()->route('admin_dashboard');
    } else {
      return view('loginAdmin', ['error'=>'Email hoặc mật khẩu không đúng']);
    }
  }
}
