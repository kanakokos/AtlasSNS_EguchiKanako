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
            'post' => 'required|string|min:1|max:150',
            'upPost' => 'required|string|min:1|max:150',
        ];
    }


        public function messages()
    {
        return [
            //ここからエラーメッセージ
            'post.required' => '文字を入力してください',
            'post.string' => '文字列で入力してください',
            'post.min' => '文字は最低1文字以上で入力してください',
            'post.max' => '文字は150文字以内で入力してください',

            'upPost.required' => '文字を入力してください',
            'upPost.string' => '文字列で入力してください',
            'upPost.min' => '文字は最低1文字以上で入力してください',
            'upPost.max' => '文字は150文字以内で入力してください',

        ];
    }
}
