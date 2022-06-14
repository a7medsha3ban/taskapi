<?php

namespace Users\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Users\Actions\Book\DestroyAction;
use Users\Actions\Book\StoreAction;
use Users\Actions\Book\UpdateAction;
use Users\Http\Requests\Book\DestroyRequest;
use Users\Http\Requests\Book\StoreRequest;
use Users\Http\Requests\Book\UpdateRequest;
use Users\Http\Resources\BookResource;
use Users\Models\Book;

class BookController extends Controller
{

    public function list(){
        $user = Auth::user();
//        $books  = Book::where('user_id',$user->id)->get();
//        return response([
//            'Books List'=>new BookResource($books)
//        ]);
        return Book::where('user_id',$user->id)->get();
    }

    public function search($name){
        $user = Auth::user();
//        $books = Book::where('user_id',$user->id)->where('name','like',"%".$name."%")->get();
//        return response([
//            'Books List'=>new BookResource($books)
//        ]);
        return Book::
        where('user_id',$user->id)->where('name','like',"%".$name."%")->get();
    }

    public function store(StoreRequest $request,StoreAction $storeAction){

        DB::beginTransaction();
        try {
            $storeAction->execute($request);
            DB::commit();
            return ['Book Has Been Added Successfully'];
        }
        catch (\Exception $exception){
            DB::rollBack();
            return [$exception->getMessage()];
        }
    }

    public function update(UpdateRequest $request,UpdateAction $updateAction){
        DB::beginTransaction();
        try {
            $updateAction->execute($request, $request->input('book_id'));
            DB::commit();
            return ['Book Has Been Updated Successfully'];
        }
        catch (\Exception $exception){
            DB::rollBack();
            return [$exception->getMessage()];
        }
    }

    public function destroy(DestroyRequest $request,DestroyAction $destroyAction){
        DB::beginTransaction();
        try {
            $record = $destroyAction->execute($request, $request->input('book_id'));
            if($record){
                DB::commit();
                return ['Book has been deleted successfully'];
            }
            else{
                return ['record not found'];
            }
        }
        catch (\Exception $exception){
            DB::rollBack();
            return [$exception->getMessage()];
        }
    }
}
