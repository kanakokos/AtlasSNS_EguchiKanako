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
            'username' => 'required|string|min:2|max:20',
            'mail' => 'required|string|unique:users,mail|min:5|max:40', //email
            'newpassword' => 'required|regex:/^[a-zA-Z0-9]*$/|min:8|max:20|confirmed', //alpha_num
            // 'newpasswordconfirm' => 'required|confirmed',
            'bio' => 'max:150',
            'iconimage' => 'nullable|mimes:jpg,png,bmp,gif,svg',
            // 'iconimage' => 'nullable',
        ];
    }


        public function messages()
    {
        return [
            //ここからエラーメッセージ
            'username.required' => 'ユーザー名を入力してください',
            'username.string' => 'ユーザー名は文字列で入力してください',
            'username.min' => 'ユーザー名は最低2文字以上で入力してください',
            'username.max' => 'ユーザー名は20文字以内で入力してください',
            'mail.required' => 'メールアドレスを入力してください',
            'mail.email' => '有効なメールアドレスを入力してください',
            'mail.unique' => 'このメールアドレスは既に使用されています',
            'mail.min' => 'メールアドレスは最低2文字以上で入力してください',
            'mail.max' => 'メールアドレスは40文字以内で入力してください',
            'newpassword.required' => 'パスワードを入力してください',
            'newpassword.regex' => 'パスワードは英数字のみ使用できます',
            'newpassword.min' => 'パスワードは8文字以上で入力してください',
            'newpassword.max' => 'パスワードは20文字以内で入力してください',
            'newpasswordconfirm.required' => 'パスワード確認を入力してください',
            'newpasswordconfirm.confirmed' => 'パスワードとパスワード確認が一致しません',
            'bio.max' => 'ユーザー名は15文字以内で入力してください',
            // 'iconimage.image' => '画像をアップロードしてください',
            'iconimage.mimes' => '画像はjpeg,png,bmp,gif,svg形式でアップロードしてください',
        ];
    }
}
