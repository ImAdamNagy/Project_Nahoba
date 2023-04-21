<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MechanicRequest extends FormRequest
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
            'introduction'=> ["required","min:5"],
            'country'=> ["required","min:3","max:100"],
            'postal_code'=> ["required","numeric"],
            'city'=> ["required","min:3","max:100"],
            'address'=> ["required","min:3","max:150"],
            'profile_pic'=> ["required","min:3","max:30"],
            'profession'=> ["required","min:3","max:30"],
            'user_id'=>["required"]
        ];
    }
}
