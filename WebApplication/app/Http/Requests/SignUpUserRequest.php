<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class SignUpUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user() == null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => ['required', 'min:4', 'max:15','unique:users,username'],
            'password' => ['required', 'min:5','regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{5,}$/','confirmed'],
            'firstname' =>['required','min:1','max:15'],
            'lastname' =>['required','min:1','max:15'],
            'tel' =>['required','min:6','max:18'],
            'email' =>['required','email','unique:users,email'],
            'role_id' =>['required',"exists:roles,id"]
        ];
    }
}

