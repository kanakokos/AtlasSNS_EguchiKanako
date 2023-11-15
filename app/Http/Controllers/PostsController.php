<?php

namespace App\Http\Controllers;
use App\Http\Requests\PostRequest; //追記：\RegisterRequest
use Illuminate\Http\Request;
use App\Post;
use Auth;


class PostsController extends Controller
{



    public function indexPost(PostRequest $request){
//        dd($request);
            $post = $request->input('post');

            //Post::createのPostはPost.phpファイルのPostを指してる
            Post::create([ //作るよ
                // 'id' => $id,
                'user_id' => Auth::user()->id,
                'post' => $post,
                // 'created_at' => $created_at,
                // 'updated_at' => $updated_at,
            ]);

            //セッションの保存、ユーザー名をほかのページでも表示できるようにする。使い方⇒ {{session('username')}} )
            // $request->session()->put('username',$request->username);

            return redirect('top');
        }

    //  public function indexView(){ //データをもらってないから空欄
    //      // if($request->isMethod('get'))
    //         return view('auth.index');
    //     //}
    // }

    public function index()
    {
        $posts = Post::get();
        return view('posts.index',['posts'=>$posts]);
    }


    public function delete($id)
    {
        Post::where('id', $id)->delete();
        return redirect('top');
    }

    }
