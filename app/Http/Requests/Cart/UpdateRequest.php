<?php

namespace App\Http\Requests\Cart;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'quantity' => ['required', 'numeric', 'min:1'],
        ];
    }

    public function messages()
    {
        return [];
    }

    public function quantity()
    {
        return $this->input('quantity');
    }

    public function id()
    {
        return $this->route('id');
    }
}
