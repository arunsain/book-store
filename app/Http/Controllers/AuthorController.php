<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
class AuthorController extends Controller
{
    public function create(){
        return view('author.index');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required'
        ]);
       $author = new Author;
       $author->name = $request->name;
       $author->save();
       return redirect("book/create")->withSuccess('Author Added Successfully');
    }
}
