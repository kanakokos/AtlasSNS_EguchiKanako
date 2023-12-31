<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\RegisterRequest; //追記：\RegisterRequest
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/top';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }



    public function registerPost(RegisterRequest $request){
//        dd($request);
            $username = $request->input('username'); //「username」＝htmlのインプットタグのname属性
            $mail = $request->input('mail');
            $password = $request->input('password');


            User::create([ //作るよ
                'username' => $username, //「username」＝DBのカラム　「$username」＝
                'mail' => $mail,
                'password' => bcrypt($password),
            ]);

            //セッションの保存、ユーザー名をほかのページでも表示できるようにする。使い方⇒ {{session('username')}} )
            $request->session()->put('username',$request->username);

            return redirect('added');
        }


     public function registerView(){ //データをもらってないから空欄
         // if($request->isMethod('get'))
            return view('auth.register');
        //}
    }

    public function added(){
        return view('auth.added');
    }
}
