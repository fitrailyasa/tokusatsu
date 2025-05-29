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
            'query' => 'nullable|string|max:255',
        ]);

        $searchQuery = trim($validatedData['query'] ?? '');

        if (empty($searchQuery)) {
            return redirect()->back()->with('error', 'Search query cannot be empty');
        }

        $datas = Data::with(['category', 'category.era', 'category.franchise', 'tags'])
            ->where(function ($q) use ($searchQuery) {
                $terms = explode(' ', $searchQuery);

                foreach ($terms as $term) {
                    $term = '%' . $term . '%';
                    $q->where(function ($query) use ($term) {
                        $query->where('name', 'like', $term)
                            ->orWhere('img', 'like', $term)
                            ->orWhereHas('category', function ($q) use ($term) {
                                $q->where('name', 'like', $term)
                                    ->orWhereHas('era', function ($q) use ($term) {
                                        $q->where('name', 'like', $term);
                                    })
                                    ->orWhereHas('franchise', function ($q) use ($term) {
                                        $q->where('name', 'like', $term)
                                            ->orWhere('slug', 'like', $term);
                                    });
                            })
                            ->orWhereHas('tags', function ($q) use ($term) {
                                $q->where('name', 'like', $term);
                            });
                    });
                }
            })
            ->withoutTrashed()
            ->orderBy('name')
            ->paginate(30);

        return view('client.search', [
            'datas' => $datas,
            'searchQuery' => $searchQuery
        ]);
    }
}
