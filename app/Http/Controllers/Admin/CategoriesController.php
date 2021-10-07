<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;

class CategoriesController extends Controller
{
    public function createCategory(Request $request)
    {
        $input = $request->all();

        Category::create($input);

        return Redirect()->back()->with('message', 'Category was created');
    }
    public function deleteCategory($id)
    {
        Category::destroy($id);

        return redirect()->back()->with('message', 'Category was deleted');
    }
}
