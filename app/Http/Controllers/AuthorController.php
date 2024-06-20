<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{

    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();

        return Auth::user()->roles()->first()->name == 'admin'
            ?
            view('admin.author.create', ['authors' => $authors, 'categories' => $categories])
            :
            abort(403);
    }

    public function store(Request $req)
    {
        $author = new Author();
        $author->name = $req->name;

        if (Auth::user()->roles()->first()->name == 'admin') {
            $author->save();
            return redirect()->back();
        } else {
            abort(403);
        }
    }

    public function update($id, Request $req)
    {
        $author = Author::findOrFail($id);
        $author->name = $req->name;

        if (Auth::user()->roles()->first()->name == 'admin') {
            $author->save();
            return redirect()->back();
        } else {
            abort(403);
        }
    }

    public function delete($id) {
        if (Auth::user()->roles()->first()->name == 'admin') {
            $author = Author::findOrFail($id);
            $author->delete();
            return redirect()->back();
        } else {
            abort(403);
        }
    }

}
