<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //false ⇒ true に変更(アクセス権限を求めない場合true)
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array  //後で意味を詳しく調べる。
     */
    public function rules()
    {
        return [
            //ここからバリデーションルール
            //ログイン機能はLaravelの認証処理で実装済み


            //ユーザー登録
            'username' => 'required|string|min:2|max:20',
            'mail' => 'required|string|unique:users,mail|min:5|max:40', //email
            'password' => 'required|regex:/^[a-zA-Z0-9]*$/|min:8|max:20|confirmed', //alpha_num
        ];
//        dd($rules);
    }


    public function messages()
    {
        return [
            //ここからエラーメッセージ
//            'required' => 'ユーザー名を入力してください',
            'username.required' => 'ユーザー名を入力してください',
            'username.string' => 'ユーザー名は文字列で入力してください',
            'username.min' => 'ユーザー名は最低2文字以上で入力してください',
            'username.max' => 'ユーザー名は20文字以内で入力してください',
            'mail.required' => 'メールアドレスを入力してください',
            'mail.email' => '有効なメールアドレスを入力してください',
            'mail.unique' => 'このメールアドレスは既に使用されています',
            'mail.min' => 'メールアドレスは最低2文字以上で入力してください',
            'mail.max' => 'メールアドレスは40文字以内で入力してください',
            'password.required' => 'パスワードを入力してください',
            'password.regex' => 'パスワードは英数字のみ使用できます',
            'password.min' => 'パスワードは8文字以上で入力してください',
            'password.max' => 'パスワードは20文字以内で入力してください',
//            'passwordConfirm.required' => 'パスワード確認を入力してください',
//            'passwordConfirm.confirmed' => 'パスワードとパスワード確認が一致しません',
        ];
//        dd($rules);
    }
}
