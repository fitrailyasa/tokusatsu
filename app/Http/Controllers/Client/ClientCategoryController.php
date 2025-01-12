<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Category;
use App\Models\Era;
use App\Models\Franchise;

class ClientCategoryController extends Controller
{
    public function index()
    {
        $eras = Era::withoutTrashed()->get()->reverse();
        $franchises = Franchise::withoutTrashed()->get()->reverse();
        $categories = Category::withoutTrashed()->latest('id')->paginate(12);
        return view('client.category.index', compact('categories'));
    }

    public function show(string $id)
    {
        $eras = Era::withoutTrashed()->get()->reverse();
        $franchises = Franchise::withoutTrashed()->get()->reverse();
        $categories = Category::withoutTrashed()->get()->reverse();
        $category = Category::where('slug', $id)->withoutTrashed()->firstOrFail();
        $datas = Data::where('category_id', $category->id)->withoutTrashed()->paginate(30);
        return view('client.category.show', compact('category', 'datas', 'eras', 'franchises', 'categories'));
    }
}
