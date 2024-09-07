<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::withoutTrashed()->get()->reverse();
        return view('client.index', compact('categories'));
    }

    public function show(string $franchiseSlug, string $categorySlug)
    {
        $category = Category::whereHas('franchise', function ($query) use ($franchiseSlug) {
            $query->where('slug', $franchiseSlug);
        })->where('slug', $categorySlug)->firstOrFail();
        $datas = $category->datas()
            ->withoutTrashed()
            ->paginate(30);
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
            ->orWhereHas('tags', function ($q) use ($query) {
                $q->where('name', 'like', $query);
            })
            ->withoutTrashed()
            ->paginate(50);

        return view('client.search', compact('datas'));
    }
}
