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

//Route::get('/', function () {
//  return view('welcome');
//});
//Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


Route::get('/form', 'FormController@index');

//ログアウト中のページ
//getに「->name('〇〇');」（nameメソッド）を追加


Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/register', 'Auth\RegisterController@registerView'); // @registerViewに変更
Route::post('/register', 'Auth\RegisterController@registerPost');

Route::get('/added', 'Auth\RegisterController@added')->name('added');
Route::post('/added', 'Auth\RegisterController@added');



// ログイン中のページ

//アクセス制限（ミドルウェア）
//プレフィックス：前（頭）にくっつく文字列
//サフィックス：後ろ（お尻）にくっつく文字列

//「'prefix'=>'user'」＝名前の前にuserが付くよの意味

//アクセス制限のため「->middleware('auth');」を追加

    Route::get('/top', 'PostsController@index')->name('top')->middleware('auth');

    Route::get('/profile', 'UsersController@profile')->name('profile')->middleware('auth');

    Route::get('/search', 'UsersController@index')->name('search')->middleware('auth');

    Route::get('/follow-list', 'PostsController@index')->name('follow-list')->middleware('auth');
    Route::get('/follower-list', 'PostsController@index')->name('follower-list')->middleware('auth');


//     Route::get('/top', ['user' => 'PostsController@index','as' => 'user.top'])->name('top');

//     Route::get('/profile', ['user' => 'UsersController@profile','as' => 'user.profile'])->name('profile');

//     Route::get('/search', ['user' => 'UsersController@index','as' => 'user.search'])->name('search');

//     Route::get('/follow-list', ['user' => 'PostsController@index','as' => 'user.follow-list'])->name('follow-list');
//     Route::get('/follower-list', ['user' => 'PostsController@index','as' => 'user.follower-list'])->name('follower-list');
//   });
// });
