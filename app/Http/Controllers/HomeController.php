<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $products = Product::All();
        $categories = Category::All();

        return view('shop.index', compact('products', 'categories'));
    }
    public function getContact()
    {
        return view('shop.contact');
    }
    public function getProduct($id)
    {
        $product = Product::find($id);
        $categories = $product->category()->get();
        return view('shop.product', compact('product', 'categories'));
    }
    public function getProfile()
    {
        return view('user.profile');
    }
    public function getCart()
    {
        if(!Session::has('cart')){
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }
    public function getShop()
    {
        return view('shop.shop');
    }

    public function getBuilder($id) 
    {      
        $product = Product::find($id);
        $variations = $product->variation()->get();

        return view('shop.largePhotos', compact('variations'));
    }
    public function getBuilder1($id)
    {
        $product = Product::find($id);
        $variations = $product->variation()->get();

        return view('shop.photo', compact('variations'));
    }

    public function getBuilder2($id)
    {
        $product = Product::find($id);
        $variations = $product->variation()->get();

        return view('shop.photoCanvas', compact('variations'));
    }

    public function getServices($id)
    {
        $product = Product::find($id);
        $categories = $product->category()->get();
        return view('shop.services', compact('product', 'categories'));
    }

    public function getCheckout()
    {
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.checkout', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }
}