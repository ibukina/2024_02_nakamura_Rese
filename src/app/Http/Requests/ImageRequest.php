<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
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
            'store_image'=>['required', 'file', 'image', 'mimes:jpg,jpeg,png',],
        ];
    }

    public function messages(){
        return[
            'store_image.required'=>'画像を選択してください',
            'store_image.file'=>'画像のアップロードが出来ていません',
            'store_image.image'=>'画像ファイルを選択してください',
            'store_image.mimes'=>'画像ファイルはjpg,jpeg,pngの形式のものを選択してください',
        ];
    }
}
