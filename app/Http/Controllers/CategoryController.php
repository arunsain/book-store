<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create(){
        return view('category.index');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required'
        ]);
       $category = new Category;
       $category->name = $request->name;
       $category->save();
       return redirect("book/create")->withSuccess('Category Added Successfully');
    }
}
