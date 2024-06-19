<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ebook;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

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
        $categories = Category::all();

        return Auth::user()->roles()->first()->name == 'admin'
            ?
            view('admin.ebook.create', ['authors' => $authors, 'categories' => $categories])
            :
            abort(403);
    }

    public function store(Request $req)
    {
        $ebook = new Ebook();
        $ebookAuthor = $req->author;
        $author = $this->createAuthorFromEbookAuthor($ebookAuthor);
        $category = $this->getCategory($req->category);
        $image = $this->saveImage($req->file('image'));

        $ebook->title = $req->title;
        $ebook->publisher = $req->publisher;
        $ebook->description = $req->description;
        $ebook->price = $req->price;
        $ebook->author_id = $author->id;
        $ebook->category_id = $category->id;
        $ebook->image = $image;

        if (Auth::user()->roles()->first()->name == 'admin') {
            $ebook->save();
            return redirect('/');
        } else {
            abort(403);
        }
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

    private function getCategory($ebookCategory): Category
    {
        $category = Category::where('name', $ebookCategory)->first();
        return $category;
    }

    private function saveImage($image): string
    {
        $manager = new ImageManager(new Driver());
        $nameGen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $path = base_path('public/storage/images' . DIRECTORY_SEPARATOR . $nameGen);
        $url = '/storage/images' . DIRECTORY_SEPARATOR . $nameGen;
        $img = $manager->read($image);
        $img = $img->resize(300, 200);
        $img->toJpeg(80)->save($path);
        return $url;
    }

}
