<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Category;
use App\Models\Franchise;

class ClientFranchiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $franchises = Franchise::withoutTrashed()->paginate(12);
        return view('client.franchise.index', compact('franchises'));
    }

    /**
     * Show the detail of a category.
     *
     * @param  string  $category
     * @return \Illuminate\Http\Response
     */
    public function show(string $category)
    {
        $franchise = Franchise::where('slug', $category)->withoutTrashed()->firstOrFail();
        $categories = Category::where('franchise_id', $franchise->id)->withoutTrashed()->paginate(12);

        return view('client.franchise.show', compact('franchise', 'categories'));
    }

    /**
     * Display the detail of a category.
     *
     * @param  string  $category
     * @param  string  $data
     * @return \Illuminate\Http\Response
     */
    public function category(string $category, string $data)
    {
        $category = Category::where('slug', $data)->withoutTrashed()->firstOrFail();
        $datas = Data::where('category_id', $category->id)->withoutTrashed()->paginate(30);
        $franchise = Franchise::findOrFail($category->franchise_id);

        return view('client.franchise.category-detail', compact('datas', 'category', 'franchise'));
    }
}
