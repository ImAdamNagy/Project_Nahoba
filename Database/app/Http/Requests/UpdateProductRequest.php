<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'seller_id' => ['required'],
            'product_name' => ['required','min:5'],
            'product_price' => ['required','numeric'],
            'types_id' => ['required'],
            'product_img' => ['required','min:4'],
            'product_description' => ['required','max:150'],
            'product_location' => ['required','max:120'],
            'product_enable' => ['required']
        ];
    }
}