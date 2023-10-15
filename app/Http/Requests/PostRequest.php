<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            //つぶやき投稿　バリデーション
            'Post' => 'required|string|min:1|max:150',
        ];
    }


        public function messages()
    {
        return [
            //ここからエラーメッセージ
            'Post.required' => '文字を入力してください',
            'Post.string' => '文字列で入力してください',
            'Post.min' => 'ユーザー名は最低1文字以上で入力してください',
            'Post.max' => 'ユーザー名は150文字以内で入力してください',
        ];
    }
}
