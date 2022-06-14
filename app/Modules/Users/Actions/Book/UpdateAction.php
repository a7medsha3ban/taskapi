<?php

namespace Users\Actions\Book;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Users\Models\Book;

class UpdateAction
{
    public function execute(Request $request,$id)
    {
        $book = Book::findOrFail($id);
        if($book->user_id == Auth::user()->id){
            $book->fill([
                'name'=>$request->input('name')
            ]);
            $book->save();
        }
    }
}
