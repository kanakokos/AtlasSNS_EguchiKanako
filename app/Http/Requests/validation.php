<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //false ⇒ true に変更
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //ここからバリデーションのルール
            'name' => 'required|string|max:20',
            'email' => 'required|email|unique:users|max:255',
        ];
    }
}
