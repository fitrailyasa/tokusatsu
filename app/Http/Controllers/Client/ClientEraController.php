<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Category;
use App\Models\Era;
use Illuminate\Http\Request;

class ClientEraController extends Controller
{
    public function index()
    {
        $eras = Era::paginate(10);
        return view('client.era.index', compact('eras'));
    }

    public function show(string $id)
    {
        $era = Era::findOrFail($id);
        $categories = Category::where('era_id', $id)->paginate(10);
        return view('client.era.show', compact('era', 'categories'));
    }

    public function category(string $id)
    {
        $datas = Data::where('category_id', $id)->get();
        $category = Category::findOrFail($id);
        $era = Era::findOrFail($category->era_id);
        return view('client.era.category-detail', compact('datas', 'category', 'era'));
    }
}
