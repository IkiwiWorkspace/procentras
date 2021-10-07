<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductsRequest;
use App\Models\Builder;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function createProduct(StoreProductsRequest $request) {
        
        $input = $request->all();

        if ($request->hasFile('image')) {
            $destination_path = '/public/images/products';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image')->storePubliclyAs($destination_path, $image_name);

            $input['image'] = $image_name;
        }
        $product = Product::create($input);
        $product->category()->attach($request->input('category_id'));
        return redirect()->back()->with('message', 'Product was created');
    }
    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->category()->detach();
        $product->delete();

        return redirect()->back()->with('message', 'Product was deleted');
    }
    public function updateProduct(Request $request, $id)
    {
        $product = Product::find($id);
        $input = $request->all();

        if ($request->hasFile('image')) {
            $destination_path = '/public/images/products';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image')->storePubliclyAs($destination_path, $image_name);
            $product->image = $image_name;
        }  

        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->builder_id = $request->input('builder_id');
        $product->price = $request->input('price');
        $product->category()->detach();
        $product->category()->attach($request->input('category_id'));

        $product->save();

        return redirect()->back()->with('message', 'Product was updated');
    }
}