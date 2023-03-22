<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignInUserRequest extends FormRequest
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
            'username' => ['required', 'min:4', 'max:15'],
            'password' => ['required', 'min:5', 'max:20', 'alpha_num','confirmed'],
            'firstname' =>['required','min:1','max:15'],
            'lastname' =>['required','min:1','max:15'],
            'tel' =>['required','min:11','max:11'],
            'email' =>['required','email'],
            'address' =>['required','min:1','max:30']
        ];
    }
}