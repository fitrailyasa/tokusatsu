<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Data;
use Illuminate\Http\Request;

class ClientCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest('era_id')->get();
        return view('client.category.index', compact('categories'));
    }

    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        $datas = Data::where('category_id', $id)->get();
        return view('client.category.show', compact('category', 'datas'));
    }
}
