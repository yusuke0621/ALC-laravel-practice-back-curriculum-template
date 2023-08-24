<?php

namespace App\Http\Requests\Cart;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'product_id' => ['required', 'numeric'],
            'quantity' => ['required', 'numeric'],
        ];
    }

    public function messages()
    {
        return [];
    }

    public function productId()
    {
        return (int) $this->input('product_id');
    }

    public function quantity()
    {
        return (int) $this->input('quantity');
    }
}
