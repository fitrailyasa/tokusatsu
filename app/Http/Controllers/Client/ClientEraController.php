<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Category;
use App\Models\Era;
use App\Models\Franchise;

class ClientEraController extends Controller
{
    public function index()
    {
        $eras = Era::withoutTrashed()->paginate(12);
        $franchises = Franchise::withoutTrashed()->get()->reverse();
        $categories = Category::withoutTrashed()->get()->reverse();
        return view('client.era.index', compact('eras', 'franchises', 'categories'));
    }

    public function show(string $category)
    {
        $era = Era::where('slug', $category)->withoutTrashed()->firstOrFail();
        $categories = Category::where('era_id', $era->id)->withoutTrashed()->paginate(12);
        $eras = Era::withoutTrashed()->get()->reverse();
        $franchises = Franchise::withoutTrashed()->get()->reverse();

        return view('client.era.show', compact('era', 'categories', 'eras', 'franchises'));
    }

    public function category(string $category, string $data)
    {
        $category = Category::where('slug', $data)->withoutTrashed()->firstOrFail();
        $datas = Data::where('category_id', $category->id)->withoutTrashed()->paginate(30);
        $era = Era::findOrFail($category->era_id);
        $eras = Era::withoutTrashed()->get()->reverse();
        $franchises = Franchise::withoutTrashed()->get()->reverse();
        $categories = Category::withoutTrashed()->get()->reverse();

        return view('client.era.category-detail', compact('datas', 'category', 'era', 'eras', 'franchises', 'categories'));
    }
}
