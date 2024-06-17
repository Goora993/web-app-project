<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Ebook;

class IndexController extends Controller
{
    public function index()
    {
        $ebooks = Ebook::all();
        $authors = Author::all();
        return view('frontend.index', ['ebooks' => $ebooks, 'authors' => $authors]);
    }
}
