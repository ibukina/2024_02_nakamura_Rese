<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
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
            'image_id'=>['required',],
            'area_id'=>['required',],
            'genre_id'=>['required',],
            'name'=>['required', 'string', 'max:191',],
            'summary'=>['required', 'string', 'max:400',],
        ];
    }

    public function messages(){
        return[
            'image_id.required'=>'画像を選択してください',
            'area_id.required'=>'エリアを選択してください',
            'genre_id.required'=>'ジャンルを選択してください',
            'name.required'=>'店名を入力してください',
            'name.string'=>'店名を文字列で入力してください',
            'name.max'=>'店名を191文字以下で入力してください',
            'summary.required'=>'説明文を入力してください',
            'summary.string'=>'説明文を文字列で入力してください',
            'summary.max'=>'説明文を400文字以下で入力してください',
        ];
    }
}
