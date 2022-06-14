<?php

namespace Users\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class DestroyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'book_id'=> 'required'
        ];
    }
}
