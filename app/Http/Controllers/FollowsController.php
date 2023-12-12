<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Auth;

class FollowsController extends Controller
{
    //
    public function followList(){
        $followingUsers = auth()->user()->followings;
        $posts = Post::query()->whereIn('user_id', Auth::user()->followings()->pluck('followed_id'))->latest()->get();
        return view('follows.followList')->with([ 'followingUsers' => $followingUsers, 'posts' => $posts,]);
        // // $followings = User::get();
        // $followingUsers = auth()->user()->followings;
        // $followingPosts = auth()->user()->followingPosts();
        // //$followingUsersにログインユーザーがフォローしているユーザーのリストを格納。
        // //->followingsはUserモデルのfollowingsメソッドを呼び出してる
        // return view('follows.followList', ['followingUsers' => $followingUsers, 'followingPosts' => $followingPosts]);
    }

// $posts = Post::query()->whereIn('user_id', Auth::user()->followings()->pluck('followed_id'))->latest()->get();
// return view('follows.followList')->with(['posts' => $posts,]);

    public function followerList(){
        $followerUsers = auth()->user()->followers;
        $posts = Post::query()->whereIn('user_id', Auth::user()->followers()->pluck('following_id'))->latest()->get();
        return view('follows.followerList')->with([ 'followerUsers' => $followerUsers, 'posts' => $posts,]);
        // $followerPosts = auth()->user()->followerPosts();
        // return view('follows.followerList', ['followerUsers' => $followerUsers, 'followerPosts' => $followerPosts]);
    }
}
