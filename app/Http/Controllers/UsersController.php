<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use App\User;
use Auth;


class UsersController extends Controller
{
    //
        // public function profile(ProfileRequest $id){
        // // dd($id);
        // // $user = User::where('id', $id)->first();
        // // $user = User::get();
        // //find指定したキーの要素だけ取得
        // $user = User::find($id);

        // $user->username = $request->input('username');
        // $user->mail = $request->input('mail');
        // $user->password = $request->input('password');
        // $user->bio = $request->input('bio');

        // $uploadFile = $request->file('image');
        // if (!empty($uploadFile)) {
        //     $thumbnailName = $request->file('image')->hashName();
        //     $request->file('image')->storeAs('public/images', $thumbnailName);

        //     $authUser->image = $thumbnailName;
        // }

        // $authUser->save();

        // return redirect('top')->with('flash_message', '変更しました');

        // }



    public function profileView($id){
        // dd($id);
        // $user = User::where('id', $id)->first();
        // $user = User::get();
        //find指定したキーの要素だけ取得
        $user = User::find($id);

        return view('users.profile', ['user'=>$user]);
    }


//
    public function profileUpdate(ProfileRequest $request)
    {
        // dd($request);
        $user = Auth::user();

        $user->username = $request->input('username');
        $user->mail = $request->input('mail');
        $user->password = bcrypt($request->input('newpassword'));
        $user->bio = $request->input('bio');
// dd($user);
        // $user->save();

        $uploadFile = $request->file('iconimage');
        // dd($request,$uploadFile);
        if (!empty($uploadFile)) {
            $thumbnailName = $request->file('iconimage')->hashName();
            $request->file('iconimage')->storeAs('public/images', $thumbnailName);

            $user->images = $thumbnailName;
        }

        // 認証情報を更新
        Auth::setUser($user);

        $user->save();



        return redirect('top')->with('flash_message', '変更しました');

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
