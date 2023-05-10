<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user() !== null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'product_name' => ['required','min:5'],
            'product_price' => ['required','numeric'],
            'types_id' => ['required', "exists:types,id"],
            'car_typeId' => ['required', "exists:carTypes,id"],
            'product_img' => ['required', 'max:1536'],
            'product_description' => ['required','max:150'],
            'product_location' => ['required','max:120'],
        ];
    }
}
