<?php

namespace App\Http\Controllers;


use App\Models\Category;

class LoginController extends Controller
{
    public function login()
    {
        $categories = Category::all();
        return view('frontend.login', ['categories' => $categories]);
    }
}
