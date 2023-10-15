<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            //プロフィール編集機能　バリデーション
            'UserName' => 'required|string|min:2|max:20',
            'MailAdress' => 'required|email|unique:users,email|min:5|max:40',
            'NewPassword' => 'required|regex:/^[a-zA-Z0-9]+$/|min:8|max:20',
            'NewPasswordConfirm' => 'required|confirmed',
            'Bio' => 'max:150',
            'IconImage' => 'image|mimes:jpeg,png,bmp,gif,svg',
        ];
    }


        public function messages()
    {
        return [
            //ここからエラーメッセージ
            'UserName.required' => 'ユーザー名を入力してください',
            'UserName.string' => 'ユーザー名は文字列で入力してください',
            'UserName.min' => 'ユーザー名は最低2文字以上で入力してください',
            'UserName.max' => 'ユーザー名は20文字以内で入力してください',
            'MailAdress.required' => 'メールアドレスを入力してください',
            'MailAdress.email' => '有効なメールアドレスを入力してください',
            'MailAdress.unique' => 'このメールアドレスは既に使用されています',
            'MailAdress.min' => 'メールアドレスは最低2文字以上で入力してください',
            'MailAdress.max' => 'メールアドレスは40文字以内で入力してください',
            'Password.required' => 'パスワードを入力してください',
            'Password.regex' => 'パスワードは英数字のみ使用できます',
            'Password.min' => 'パスワードは8文字以上で入力してください',
            'Password.max' => 'パスワードは20文字以内で入力してください',
            'PasswordConfirm.required' => 'パスワード確認を入力してください',
            'PasswordConfirm.confirmed' => 'パスワードとパスワード確認が一致しません',
            'Bio.max' => 'ユーザー名は15文字以内で入力してください',
            'IconImage.image' => '画像をアップロードしてください',
            'IconImage.mimes' => '画像はjpeg,png,bmp,gif,svg形式でアップロードしてください',
        ];
    }
}
