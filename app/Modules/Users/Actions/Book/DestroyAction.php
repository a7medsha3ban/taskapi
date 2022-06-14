<?php

namespace Users\Actions\Book;


use Illuminate\Http\Request;
use Users\Models\Book;

class DestroyAction
{
    public function execute(Request $request,$id)
    {
        $book = Book::find($id);
        if (!$book)
            return false;
        $book->forceDelete();
        return true;
    }
}
