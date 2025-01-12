<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Category;
use App\Models\Era;
use App\Models\Franchise;

class ClientFranchiseController extends Controller
{
    public function index()
    {
        $franchises = Franchise::withoutTrashed()->paginate(12);
        $eras = Era::withoutTrashed()->get()->reverse();
        $categories = Category::withoutTrashed()->get()->reverse();
        return view('client.franchise.index', compact('franchises', 'eras', 'categories'));
    }

    public function show(string $category)
    {
        $franchise = Franchise::where('slug', $category)->withoutTrashed()->firstOrFail();
        $categories = Category::where('franchise_id', $franchise->id)->withoutTrashed()->paginate(12);
        $eras = Era::withoutTrashed()->get()->reverse();
        $franchises = Franchise::withoutTrashed()->get()->reverse();

        return view('client.franchise.show', compact('franchise', 'categories', 'eras', 'franchises'));
    }

    public function category(string $category, string $data)
    {
        $category = Category::where('slug', $data)->withoutTrashed()->firstOrFail();
        $datas = Data::where('category_id', $category->id)->withoutTrashed()->paginate(30);
        $franchise = Franchise::findOrFail($category->franchise_id);
        $eras = Era::withoutTrashed()->get()->reverse();
        $franchises = Franchise::withoutTrashed()->get()->reverse();
        $categories = Category::withoutTrashed()->get()->reverse();

        return view('client.franchise.category-detail', compact('datas', 'category', 'franchise', 'eras', 'franchises', 'categories'));
    }
}
