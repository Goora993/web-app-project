<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    // Display a listing of the authors
    public function index()
    {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    // Show the form for creating a new author
    public function create()
    {
        return view('authors.create');
    }

    // Store a newly created author in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
        ]);

        Author::create($request->all());

        return redirect()->route('authors.index')
            ->with('success', 'Author created successfully.');
    }

    // Display the specified author
    public function show(Author $author)
    {
        return view('authors.show', compact('author'));
    }

    // Show the form for editing the specified author
    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    // Update the specified author in storage
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
        ]);

        $author->update($request->all());

        return redirect()->route('authors.index')
            ->with('success', 'Author updated successfully.');
    }

    // Remove the specified author from storage
    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()->route('authors.index')
            ->with('success', 'Author deleted successfully.');
    }
}
