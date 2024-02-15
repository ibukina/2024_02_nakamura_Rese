<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AreaRequest extends FormRequest
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
            'store_area'=>['required', 'string',],
        ];
    }

    public function messages(){
        return[
            'store_area.required'=>'エリアを入力してください',
            'store_area.string'=>'エリアを文字列で入力してください',
        ];
    }
}
