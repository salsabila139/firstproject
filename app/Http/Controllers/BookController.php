<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //create data book
    public function createBook(Request $request){
        $data = $request->all();
        $book = new Book;
        $book->title = $data['title'];
        $book->description = $data['description'];
        $book->author = $data['author'];
        $book->publisher = $data['publisher'];

        //save ke database
        $book->save();
        // nilai return
        $status = "success create data";
        return response()->json(compact('book', 'status'), 200);
    }

    //get data book by id
    public function showBookById($id){
        $book = Book::find($id);
        $status =  "success show data";
        return response()->json(compact('book', 'status'), 200);
    }

    //get data all books
    public function showAllBooks(){
        $book = Book::all();
        $status = "success shoe=w all data";
        return response()->json(compact('status', 'book'), 200);
    }

    //update data book
    public function updateBook(Request $request, $id){
        $data =  $request->all();
        $book = Book::find($id);

        $book->title = $data['title'];
        $book->description = $data['description'];
        $book->author = $data['author'];
        $book->publisher = $data['publisher'];

        $book->save();
        $status = "success update data";
        return response()->json(compact('status', 'book'), 200);
    }

    //delete data book
    public function deleteBook($id){
        $book = Book::find($id);
        $book->delete();
        $status = "success deleted";
        return response()->json(compact('status'), 200);
    }

}
