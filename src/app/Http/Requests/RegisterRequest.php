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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username'=>['required', 'string', 'max:191'],
            'email'=>['required', 'email', 'unique:users,email', 'string', 'max:191'],
            'password'=>['required', 'min:8', 'max:191'],
        ];
    }

    public function messages(){
        return[
            'username.required'=>'お名前を入力してください',
            'username.string'=>'お名前を文字列で入力してください',
            'username.max'=>'お名前を191文字以下で入力してください',
            'email.required'=>'メールアドレスを入力してください',
            'email.email'=>'メールアドレスを正しい形式で入力してください',
            'email.unique'=>'他のユーザーと重複しないメールアドレスを入力してください',
            'email.string'=>'メールアドレスを文字列で入力してください',
            'email.max'=>'メールアドレスを191文字以下で入力してください',
            'password.required'=>'パスワードを入力してください',
            'password.min'=>'パスワードを8文字以上で入力してください',
            'password.max'=>'パスワードを191文字以下で入力してください',
        ];
    }
}
