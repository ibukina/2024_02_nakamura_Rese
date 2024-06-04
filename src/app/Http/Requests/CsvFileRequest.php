<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CsvFileRequest extends FormRequest
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
            'csvFile'=>['required', 'file', 'mimes:csv,txt', 'max:2048'],
        ];
    }

    public function messages(){
        return[
            'csvFile.required'=>'ファイルを選択してください',
            'csvFile.file'=>'ファイルのアップロードが出来ていません',
            'csvFile.mimes'=>'ファイルはcsv形式のみアップロード可能です',
            'csvFile.max'=>'ファイルは2MB以下にしてください',
        ];
    }
}
