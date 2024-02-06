<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'date'=>['required', 'date', 'after:today'],
            'time'=>['required', 'date_format:"H:i"'],
            'number'=>['required', 'string', 'max:191'],
        ];
    }

    public function messages(){
        return[
            'date.required'=>'予約日を入力してください',
            'date.date'=>'予約日を年月日で入力してください',
            'date.after'=>'明日以降の予約をお願いします',
            'time.required'=>'予約時間を入力してください',
            'time.date_format'=>'予約時間を時間：分で入力してください',
            'number.required'=>'予約人数を入力してください',
            'number.string'=>'予約人数を文字列で入力してください',
            'number.max'=>'予約人数を191文字以内で入力してください'
        ];
    }

    protected function getRedirectUrl()
    {
        $reservation_id = $this->input("reservation_id");
        return '/reservation/' . $reservation_id;
    }
}
