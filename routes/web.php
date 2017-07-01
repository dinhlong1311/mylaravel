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

// Database
Route::get('mysql', function() {
  Schema::create('user', function($table) {
    $table->increments('id');
    $table->string('email', 50);
    $table->string('password');
    $table->integer('role')->default('0');
    $table->timestamps();
  });
  echo "Da tao database";
});

// Query Builder
Route::get('qb/get', function() {
  $data = DB::table('users')->select('id','name','email','role_id')->orderBy('id','desc')->get();
  foreach($data as $row) {
    foreach($row as $key=>$value) {
      echo $key.': '.$value.'</br>';
    }
    echo '<hr/>';
  }
});

Route::get('qb/where', function() {
  $data = DB::table('users')
          ->select('id','name','email','role_id')
          ->where('id',1)
          ->get();
  foreach($data as $row) {
    foreach($row as $key=>$value) {
      echo $key.': '.$value.'</br>';
    }
    echo '<hr/>';
  }
});

Route::get('qb/join', function() {
  $data = DB::table('products')
          ->join('categories','products.id_category','=','categories.id')
          ->select(DB::raw('products.id, products.name, products.decription, categories.name as ten_cate'))
          ->get();
  foreach($data as $row) {
    foreach($row as $key=>$value) {
      echo $key.': '.$value.'</br>';
    }
    echo '<hr/>';
  }
});

Route::get('qb/limit', function() {
  $data = DB::table('users')
          ->select('id','name','email','role_id')
          ->skip(2)->take(2)->get();
  foreach($data as $row) {
    foreach($row as $key=>$value) {
      echo $key.': '.$value.'</br>';
    }
    echo '<hr/>';
  }
});

Route::get('qb/insert', function() {
  DB::table('users')
      ->insert(['name'=>'Long Ho', 'email'=>'spy123@gmail.com', 'password'=>bcrypt('123456')]);
  echo "Inserted!!!";
});

Route::get('qb/update/{id}', function($id) {
  DB::table('users')->where('id',$id)->update(['role'=>2]);
  echo "Updated!!!";
});

// Model
Route::get('model/save/{ten}', function($ten) {
  $user = new App\User();

  $user->name = $ten;
  $user->email = str_random(10).'@gmail.com';
  $user->password = bcrypt('123456');

  $user->save();
  echo 'Da luu ten '.$ten;
})->where(['ten'=>'[a-zA-Z ]+']);

Route::get('model/get', function() {
  $data = App\Role::all()->toJson();
  var_dump($data);
});

Route::get('product/findid', function() {
  $data = App\Product::find(2)->category->toArray();
  var_dump($data);
});

Route::get('category/getbyid', function() {
  $data = App\Category::find(1)->products->toArray();
  var_dump($data);
});

// Middleware
Route::get('diem',['middleware'=>'MyMiddleware', function() {
  echo "Ban da co diem";
}]);

Route::get('loi', function() {
  echo "Ban chua co diem";
})->name('loi');

// Auth
Route::get('login', function() {
  return view('login');
});
Route::post('login', 'MyController@loginUser')->name('loginUser');

Route::get('admin/auth/login', function() {
  return view('loginAdmin');
});
Route::post('admin/auth/login', 'AdminController@loginAdmin')->name('loginAdmin');
Route::get('admin/dashboard', function() {
  return view('admin_dashboard');
})->name('admin_dashboard');

// Session
Route::get('session', function() {
  $session = session('name', 'Long Hoo');
  echo $session;
});
Route::get('session/get', 'MyController@session');
Route::get('session/check', function() {
  if(session()->has('user_id')) {
    echo "Session da duoc tao!!!";
  } else {
    echo "Session khong duoc tao!!!";
  }
});
Route::get('session/delete', function() {
  session()->flush();
  echo "Da xoa tat ca Session";
});
