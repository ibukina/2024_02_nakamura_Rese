<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class EmailVerificationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user() && $this->user() instanceof MustVerifyEmail;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id' => ['required', 'string',
                Rule::exists('users')->where(function ($query) {
                    $query->where('id', $this->user()->getKey());
                }),
            ],
            'hash' => ['required', 'string'],
        ];
    }

    public function fulfill()
    {
        Log::info('Fulfill method was called.');
        if (! hash_equals((string) $this->route('hash'), sha1($this->user()->getEmailForVerification()))) {
            abort(403);
        }

        if ($this->user()->hasVerifiedEmail()) {
            return redirect('/');
        }

        if ($this->user()->markEmailAsVerified()) {
            event(new Verified($this->user()));
        }

        return redirect('/')->with('verified', true);
    }
}
