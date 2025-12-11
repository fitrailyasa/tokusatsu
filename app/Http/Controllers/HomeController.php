<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::withoutTrashed()->get()->reverse();
        return view('client.index', compact('categories'));
    }

    public function offline()
    {;
        return view('offline');
    }

    public function privacyPolicy()
    {
        return view('privacy-policy');
    }

    public function termsConditions()
    {
        return view('terms-conditions');
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

        $input = trim($validatedData['query'] ?? '');

        if ($input === '') {
            $datas = new LengthAwarePaginator([], 0, 10);
            return view('client.search', compact('datas'));
        }

        $keywords = explode(' ', $input);

        $datas = \App\Models\Video::query()
            ->withoutTrashed()
            ->where(function ($query) use ($keywords) {

                foreach ($keywords as $word) {

                    $query->where(function ($q) use ($word) {

                        if (is_numeric($word)) {

                            $q->where('number', '=', $word)
                                ->orWhereHas('category', function ($cat) use ($word) {
                                    $like = '%' . $word . '%';
                                    $cat->where('fullname', 'like', $like)
                                        ->orWhere('name', 'like', $like);
                                });
                        } else {

                            $like = '%' . $word . '%';

                            $q->where('title', 'like', $like)
                                ->orWhere('type', 'like', $like)
                                ->orWhereHas('category', function ($cat) use ($like) {
                                    $cat->where('name', 'like', $like)
                                        ->orWhere('fullname', 'like', $like);
                                });
                        }
                    });
                }
            })
            ->paginate(10);

        return view('client.search', compact('datas'));
    }
}
