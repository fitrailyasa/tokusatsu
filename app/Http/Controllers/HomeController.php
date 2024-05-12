<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $datas = Data::all();
        $categories = Category::all()->reverse();
        return view('client.index', compact('datas', 'categories'));
    }

    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        $datas = Data::where('category_id', $id)->get();
        return view('client.show', compact('category', 'datas'));
    }

    public function search(Request $request)
    {
        $validatedData = $request->validate([
            'query' => 'required|string|max:255',
        ]);

        $query = '%' . $validatedData['query'] . '%';

        $datas = Data::where('name', 'like', $query)
            ->orWhere('img', 'like', $query)
            ->orWhereHas('tags', function($q) use ($query) {
                $q->where('name', 'like', $query);
            })
            ->paginate(50);

        return view('client.search', compact('datas'));
    }

}
