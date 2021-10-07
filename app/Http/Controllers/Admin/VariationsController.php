<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Value;
use App\Models\Variation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VariationsController extends Controller
{
    public function index()
    {
        $variations = Variation::all();
        $products = Product::all();

        return view('dashboard.variations', compact('variations', 'products'));
    }
    public function createVariation(Request $request)
    {
        $input = $request->all();

        Variation::create($input);

        return Redirect()->back()->with('message', 'Variation was created');
    }
    public function addValues(Request $request)
    {
        $variation = Variation::find($request->input('variation_id'));

        $values = explode(',', $request->input('name'));
        $prices = explode(',', $request->input('price'));

        $results = array_combine($values, $prices);
        foreach ($results as $key => $item) {
            $value = Value::firstOrCreate(
                ['name' => $key],
                ['price' => $item]
            );
            $variation->values()->attach($value->id);
        }
        return Redirect()->back()->with('messageValueCreate', 'Values was added');
    }
    public function addVariationToProduct(Request $request)
    {
        $product = Product::find($request->input('product_id'));
        $variations = $request->input('variations');

        foreach ($variations as $variation) {
            $product->variation()->attach($variation);
        }
        
        return Redirect()->back()->with('messageVariationAdded', 'Variation was added');
    }
    public function getEditVariations()
    {
        $variations = DB::table('variations')->paginate(10);;

        return view('dashboard.variationsEdit', compact('variations'));
    }
    public function deleteVariation($id)
    {
        $variation = Variation::find($id);       
        $variation->values()->detach();
        $products = Product::all();
        foreach($products as $product) {
            foreach($product->variation()->get() as $variationProduct) {
                if($variationProduct['id'] == $id) {
                    $product->variation()->detach($variationProduct['id']);
                    Variation::destroy($id);
                }
            }
        }
        return redirect()->back()->with('message', 'Variation was deleted');
    }
    public function getEditVariation($id)
    {
        $variation = Variation::find($id);

        return view('dashboard.variationEdit', compact('variation'));
    }
    public function editVariation(Request $request, $id)
    {
        $variation = Variation::find($id);

        $variation->name = $request->input('variation_name');
        $variation->save();

        return redirect()->back()->with('variation', 'Variation was updated');
    }
}