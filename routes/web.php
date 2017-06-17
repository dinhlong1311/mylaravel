<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('homepage');

Route::get('hello', function() {
  return "Hello World";
})->name('hello');

Route::get('/hi', function() {
  echo "Tôi là Long";
});

Route::get('NgonNgu/PHP', function() {
  return "<h1>Lập trình Web bằng PHP</h1>";
});
Route::get('ten/{name}', function($name) {
  echo "Xin chao ".$name;
})->where(['name'=>'[a-zA-Z]+']);

Route::get('404', function() {
  return redirect()->route('homepage');
});

Route::group(['prefix'=>'user'], function() {
  Route::get('user1', function() {
    return "Xin chào User1";
  });
  Route::get('user2', function() {
    return "Xin chào User2";
  });
  Route::get('user3', function() {
    return "Xin chào User3";
  });
});

Route::get('xinchao', 'MyController@xinchao');
Route::get('khoahoc/{kh}', 'MyController@khoahoc');

Route::get('my-url', 'MyController@GetURL');

Route::get('getForm', function() {
  return view('postForm');
});
Route::post('postForm', 'MyController@postForm')->name('postForm');

Route::get('setCookie', 'MyController@setCookie');
Route::get('getCookie', 'MyController@getCookie');

Route::get('uploadFile', function() {
  return view('postFile');
});
Route::post('postFile', 'MyController@postFile')->name('postFile');

Route::get('getJSON', 'MyController@getJSON');

View::share('name', "Dinh Long");
Route::get('myView', 'MyController@myView');
Route::get('viewID/{id}', 'MyController@viewId');

Route::get('blade/{str}', 'MyController@bladeTemplate');
