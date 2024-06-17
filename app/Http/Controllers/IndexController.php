<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use App\Models\Ebook;

class IndexController extends Controller
{
    public function index()
    {
        $ebooks = Ebook::all();
        $authors = Author::all();
        $categories = Category::all();
        return view('frontend.index', ['ebooks' => $ebooks, 'authors' => $authors, 'categories' => $categories]);
    }
}
