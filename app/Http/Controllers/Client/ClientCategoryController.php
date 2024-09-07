<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Category;

class ClientCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withoutTrashed()->latest('id')->paginate(12);
        return view('client.category.index', compact('categories'));
    }

    public function show(string $id)
    {
        $category = Category::where('slug', $id)->withoutTrashed()->firstOrFail();
        $datas = Data::where('category_id', $category->id)->withoutTrashed()->paginate(30);
        return view('client.category.show', compact('category', 'datas'));
    }
}
