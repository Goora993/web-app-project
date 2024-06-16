<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    public function create()
    {
        return view('frontend.author.create');
    }

    public function store(Request $req)
    {

    }



}
