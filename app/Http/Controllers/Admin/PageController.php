<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Builder;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Value;
use App\Models\Variation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard');
    }
    public function getCreateProduct() 
    {
        $categories = Category::all();
        $builders = Builder::all();

        return view('dashboard.create', compact('categories', 'builders'));
    }
    public function getProducts() 
    {
        $products = DB::table('products')->paginate(10);

        return view('dashboard.allProducts', compact('products'));
    }
    public function getCreateCategory()
    {
        return view('dashboard.createCategory');
    }
    public function getCategories()
    {
        $categories = DB::table('categories')->paginate(10);

        return view('dashboard.allCategories', compact('categories'));
    }
    public function getEditProduct($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $builders = Builder::all();
        $product_categories = $product->category()->allRelatedIds()->toArray();
        $product_variations = $product->variation()->get()->toArray();

        return view('dashboard.editProduct', compact(['product', 'categories', 'builders', 'product_categories', 'product_variations']));
    }
    public function getUsers()
    {
        $users = DB::table('users')->paginate(10);

        return view('dashboard.allUsers', compact('users'));
    }
}