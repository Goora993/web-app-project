<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use App\Models\Author;
use Illuminate\Http\Request;

class EbookController extends Controller
{
    public function ebooks()
    {
        $ebooks = Ebook::all();
        return view('frontend.ebook.list', ['ebooks' => $ebooks]);
    }

    public function ebook()
    {
        // get single ebook by id
        $ebook = Ebook::all();
        return view('frontend.ebook.single', ['name' => $ebook]);
    }

    public function create()
    {
        $authors = Author::all();
        return view('frontend.ebook.create', ['authors' => $authors]);
    }

    public function store(Request $req)
    {
        $ebook = new Ebook();
        $ebookAuthor = $req->author;
        $author = $this->createAuthorFromEbookAuthor($ebookAuthor);

        $ebook->title = $req->title;
        $ebook->author_id = $author->id;
        $ebook->publisher = $req->publisher;
        $ebook->category = $req->category;
        $ebook->description = $req->description;
        $ebook->image = $req->image;

        $ebook -> save();
    }

    private function createAuthorFromEbookAuthor($ebookAuthor): Author
    {
        $parts = preg_split('/\s+/', $ebookAuthor);

        $author = new Author();
        $author->id = $parts[0];
        $author->name = $parts[1];
        $author->surname = $parts[2];

        return $author;
    }

}
