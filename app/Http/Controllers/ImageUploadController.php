<?php

namespace App\Http\Controllers;

use App\Models\ImageUpload;
use App\Models\Product;
use App\Models\Value;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function getPhotoBuilder($id)
    {
        $product = Product::find($id);
        $variations = $product->variation()->get();

        return view('shop.photo', compact('variations'));
    }
    public function storeMedia(Request $request) 
    {
        $path = storage_path('tmp/uploads');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }
    public function store(Request $request)
    {
        // $image = $request->file('file');
        // $imagename = $image->getClientOriginalName();
        // $image->move(public_path('images/order'), $imagename);

        // $imageUpload = new ImageUpload();
        // $imageUpload->filename = $imagename;
        // $imageUpload->save();

        // return response()->json(['success' => $imagename]);
        foreach ($request->input('document', []) as $file) {
        $project->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('document');
    }

    return redirect()->route('projects.index');
    }

    public function destroy(Request $request)
    {
        $filename = $request->get('filename');
        ImageUpload::where('filename', $filename)->delete();
        $path = public_path().'/images/order/'.$filename;
        
        if(file_exists($path)) {
            unlink($path);
        }

        return $filename;
    }

    public function getAddToCart(Request $request, $id)
    {

    }

   
}