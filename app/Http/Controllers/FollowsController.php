<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class FollowsController extends Controller
{
    //
    public function followList(){
        // $followings = User::get();
        $followingUsers = auth()->user()->followings;
        $followingPosts = auth()->user()->followingPosts();
        //$followingUsersにログインユーザーがフォローしているユーザーのリストを格納。
        //->followingsはUserモデルのfollowingsメソッドを呼び出してる
        return view('follows.followList', ['followingUsers' => $followingUsers, 'followingPosts' => $followingPosts]);
    }



    public function followerList(){
        $followerUsers = auth()->user()->followers;
        $followerPosts = auth()->user()->followerPosts();
        return view('follows.followerList', ['followerUsers' => $followerUsers, 'followerPosts' => $followerPosts]);
    }
}
