<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use App\Models\Ebook;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $ebooks = Ebook::all();
        $authors = Author::all();
        $categories = Category::all();

        if (Auth::user() == null) {
            return view('user.index', ['ebooks' => $ebooks, 'authors' => $authors, 'categories' => $categories]);
        } else {
            return Auth::user()->roles()->first()->name == 'admin'
                ?
                view('admin.index', ['ebooks' => $ebooks, 'authors' => $authors, 'categories' => $categories])
                :
                view('user.index', ['ebooks' => $ebooks, 'authors' => $authors, 'categories' => $categories]);
        }
    }
}
