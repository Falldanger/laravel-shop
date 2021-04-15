<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'code' => ['required', 'min:3', 'max:255', 'unique:categories,code'],
            'name' => ['required', 'min:3', 'max:255'],
            'description' => ['required', 'min:5'],
            'price' => ['required', 'numeric', 'min:1'],
            'count' => ['required', 'numeric', 'min:0']
        ];
    }
}
