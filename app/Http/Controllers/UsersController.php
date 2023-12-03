<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }

    //searchを表示させるために記述したが、ページを表示させるためだけのときも$userなどは読み込む必要があるので下で記述しているsearchメソッドのみで良い
    // public function index(){
    //     return view('users.search');
    // }


    public function search(Request $request)
    {
        $users = User::get()->sortByDesc('created_at');
        // 1つ目の処理
        $keyword = $request->input('keyword');
        // 2つ目の処理
        if(!empty($keyword)){
            $users = User::where('username','like', '%'.$keyword.'%')->get();
        }else{
            $users = User::all();
        }
        // 3つ目の処理
        return view('users.search', ['users'=>$users])->with('keyword',$keyword);;
        // return view('users.search',['users'=>$users], compact('users'));
        //compact('users')と['users'=>$users]は同じ意味
    }


    public function getLogout(){
        Auth::logout(); //ログアウトになる
        return redirect()->route('login');
    }




    // フォロー

    public function following($id)
    {
        // dd($id);
        $user = User::where('id', $id)->first();
        // dd($user);
        $follower = auth()->user();
        // フォローしているか
        // dd($users);
        $is_following = $follower->isFollowing($user->id);
        if(!$is_following) {
            // フォローしていなければフォローする
            $follower->follow($user->id);
            return back();
        }
    }

    // フォロー解除
    public function unfollow($id)
    {
        $users = User::where('id', $id)->first();
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($users->id);
        if($is_following) {
            // フォローしていればフォローを解除する
            $follower->unfollow($users->id);
            return back();
        }
    }


}
