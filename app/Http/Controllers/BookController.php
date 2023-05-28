<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Review;
use App\Models\Category;
use App\Models\Author;


class BookController extends Controller
{
    public function index(){
        $books =   Book::with('category')->with('authors')->orderBy('id', 'DESC')->get();
        return view('books.index',compact('books'));
    }

    public function bookDetail(Request $request){
        $bookDetail =   Book::with(['category','authors','reviews.user','reviews.book'])->find($request->id);
        return view('books.detail',compact('bookDetail'));
    }

    public function create(){
        $categorys =   Category::get();
        $authors =   Author::get();
        return view('books.create',compact('categorys','authors'));
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'category' => 'required',
            'author' => 'required'
            
        ]);
        $book = new Book;
        $book->title = $request->title;
        $book->description = $request->description;
        $book->price = $request->price;
        $book->category_id = $request->category;
        $book->save();
        $book->authors()->attach($request->author);
        return redirect("/")->withSuccess('Book Added Successfully');
    
   }
    public function edit($id){
        $book =   Book::with(['category','authors'])->find($id);
        $categorys =   Category::get();
        $authors =   Author::get();
        return view('books.edit',compact('book','categorys','authors'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'category' => 'required',
            'author' => 'required'
            
        ]);
    
        $book =  Book::find($id);
        $book->title = $request->title;
        $book->description = $request->description;
        $book->price = $request->price;
        $book->category_id = $request->category;
        $book->save();
        $book->authors()->detach();
        $book->authors()->attach($request->author);
        return redirect(route('edit-book',['id'=> $id]))->withSuccess('Book updated Successfully');

    }
    
}
