<?php

namespace Users\Actions\Book;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Users\Models\Book;

class StoreAction
{
    public function execute(Request $request)
    {
        $book = Book::create([
            'name'=>$request->input('name'),
            'user_id'=>Auth::user()->id,
        ]);
    }
}
