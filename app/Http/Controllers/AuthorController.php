<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('frontend.author.create', ['authors'=>$authors, 'categories'=>$categories]);
    }

    public function store(Request $req)
    {
        $author = new Author();
        $author->name = $req->name;
        $author->save();

        return back();
    }

}
