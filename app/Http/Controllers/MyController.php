<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Admin;

class MyController extends Controller
{
  public function xinchao() {
    echo "Xin chao cac ban";
  }

  public function khoahoc($kh) {
    echo "Khoa hoc ".$kh;
    // return redirect()->route('homepage');
  }

  public function GetURL(Request $req) {
    // return $req->url();
    // if($req->isMethod('post')) {
    //   echo "Phương thức POST";
    // } else {
    //   echo "Không phải phương thức POST";
    // }
    if($req->is('my*')) {
      echo "Có my";
    } else {
      echo "Không có my";
    }
  }

  public function postForm(Request $req) {
    $form = ['user'=>$req->user, 'pass'=>$req->pass];
    return response()->json($form);
  }

  public function setCookie() {
    $res = new Response();
    $res->withCookie('name', 'Dinh Long Ho', 1);
    return $res;
  }

  public function getCookie(Request $req) {
    return $req->cookie('name');
  }

  public function postFile(Request $req) {
    if($req->hasFile('myFile')) {
      $file = $req->file('myFile');
      $file->move('public/img', 'long_ho.jpg');
    } else {
      echo "Không có file";
    }
  }

  public function getJSON() {
    $array = ['ten'=>'Long', 'tuoi'=> '24', 'gioitinh'=>'Nam'];
    return response()->json($array);
  }

  public function myView() {
    return view('view.myView');
  }
  public function viewID($id) {
    return view('view.myView',['i'=>$id]);
  }

  public function bladeTemplate($string) {
    $khoahoc = "<b>Học Laravel Framework cơ bản</b>";
    if ($string=='laravel') {
      return view('pages.laravel', ['kh'=>$khoahoc]);
    } elseif ($string=='php') {
      return view('pages.php', ['kh'=>$khoahoc]);
    } else {
      return redirect()->route('homepage');
    }
  }

  public function loginUser(Request $request) {
    $email = $request['email'];
    $password = $request['password'];
    $data = ['email'=>$email, 'password'=>$password];

    if(Auth::attempt($data)) {
      return view('login_success',['user'=>Auth::user()]);
    }
    else {
      return view('login', ['error'=>'Email hoặc Password không đúng']);
    }
  }

  public function session(Request $request)
  {
    if(!$request->session()->exists('user_id')) {
      $request->session()->put('user_id','dinhlong.hoo@outlook.com');
    }
    $user_id =  $request->session()->get('user_id');
    echo $user_id;
  }
}
