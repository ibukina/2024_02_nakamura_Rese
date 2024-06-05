<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;

class ImportCsvRecordRequest extends FormRequest
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
            '店舗名'=>['required', 'string', 'max:50',],
            '地域'=>['required', 'string', 'in:東京都,大阪府,福岡県'],
            'ジャンル'=>['required', 'string', 'in:寿司,焼肉,イタリアン,居酒屋,ラーメン'],
            '店舗概要'=>['required', 'string', 'max:400',],
            '画像URL'=>['required', 'url'],
        ];
    }

    public function messages(){
        return[
            '店舗名.required'=>'店舗名は入力必須です',
            '店舗名.string'=>'店舗名を文字列で入力してください',
            '店舗名.max'=>'店舗名を50文字以下で入力してください',
            '地域.required'=>'地域は入力必須です',
            '地域.string'=>'  地域を文字列で入力してください',
            '地域.in'=>'地域は東京都、大阪府、福岡県のいずれかでなければなりません',
            'ジャンル.required'=>'ジャンルは入力必須です',
            'ジャンル.string'=>'ジャンルを文字列で入力してください',
            'ジャンル.in'=>'ジャンルは寿司、焼肉、イタリアン、居酒屋、ラーメンのいずれかでなければなりません',
            '店舗概要.required'=>'店舗概要は入力必須です',
            '店舗概要.string'=>'店舗概要を文字列で入力してください',
            '店舗概要.max'=>'店舗概要を400文字以下で入力してください',
            '画像URL.required'=>'画像URLは入力必須です',
            '画像URL.url'=>'画像URLは有効なURLでなければなりません',
        ];
    }
}
