<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class MechanicUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->role->role_name == "mechanic";
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'introduction'=> ["required","min:5"],
            'country'=> ["required","min:3","max:100"],
            'postal_code'=> ["required","numeric"],
            'city'=> ["required","min:3","max:100"],
            'address'=> ["required","min:3","max:150"],
            'profession'=> ["required","min:3","max:30"]
        ];
    }
}
