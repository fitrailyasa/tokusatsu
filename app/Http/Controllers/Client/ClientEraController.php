<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Category;
use App\Models\Era;

class ClientEraController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eras = Era::withoutTrashed()->paginate(15);
        return view('client.era.index', compact('eras'));
    }

    /**
     * Show the detail of a category.
     *
     * @param  string  $category
     * @return \Illuminate\Http\Response
     */
    public function show(string $category)
    {
        $era = Era::where('slug', $category)->withoutTrashed()->firstOrFail();
        $categories = Category::where('era_id', $era->id)->withoutTrashed()->paginate(15);

        return view('client.era.show', compact('era', 'categories'));
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
        $era = Era::findOrFail($category->era_id);

        return view('client.era.category-detail', compact('datas', 'category', 'era'));
    }
}
