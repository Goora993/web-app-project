<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ebook;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function ebookCart()
    {
        $categories = Category::all();
        return view('user.cart', ['categories' => $categories]);
    }
    public function addToCart($id)
    {
        $book = Ebook::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $book->name,
                "quantity" => 1,
                "price" => $book->price,
                "image" => $book->image
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Ebook został dodany do koszyka!');
    }

    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Ebook został dodany do koszyka!???');
        }
    }

    public function deleteFromCart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Ebook został usunięty z koszyka!');
        }
    }

    public function closeCart()
    {
        session()->forget('cart');
        $cart = session()->get('cart', []);
        session()->put('cart', $cart);
        session()->flash('success', 'Dokonano zakupu!');
    }
}
