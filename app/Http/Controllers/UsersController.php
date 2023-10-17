<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function search(){
        return view('users.search');
    }

    public function getLogout(){
        Auth::logout(); //ログアウトになる
        return redirect()->route('login');
    }
}
