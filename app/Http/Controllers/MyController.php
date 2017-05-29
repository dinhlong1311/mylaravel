<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;

class MyController extends Controller
{
  public function xinchao() {
    echo "Xin chao cac ban";
  }

  public function khoahoc($kh) {
    echo "Khoa hoc ".$kh;
    return redirect()->route('homepage');
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
    echo $req->user;
    echo $req->pass;
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
}
