<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenreRequest extends FormRequest
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
            'store_genre'=>['required', 'string', 'max:191'],
        ];
    }

    public function messages(){
        return[
            'store_genre.required'=>'ジャンルを入力してください',
            'store_genre.string'=>'ジャンルを文字列で入力してください',
            'store_genre.max'=>'ジャンルを191文字以下で入力してください',
        ];
    }
}
