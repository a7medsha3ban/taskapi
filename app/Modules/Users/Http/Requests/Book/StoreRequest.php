<?php

namespace Users\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|regex:/^[\pL\s\-]+$/u|min:4|max:191',
        ];
    }
}
