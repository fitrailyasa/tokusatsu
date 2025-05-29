<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Film;

class ClientFilmController extends Controller
{
    public function show($franchise, $category)
    {
        $category = Category::where('slug', $category)->with('franchise')->firstOrFail();

        if ($category->franchise->slug !== $franchise) {
            abort(404);
        }

        $films = $category->films()->with('category')->get();

        return view('client.film.show', [
            'category' => $category,
            'franchise' => $category->franchise,
            'films' => $films,
        ]);
    }


    public function watch($franchise, $category, $type, $number)
    {
        $category = Category::where('slug', $category)->firstOrFail();

        if ($category->franchise->slug !== $franchise) {
            abort(404);
        }

        $film = Film::where([
            ['category_id', '=', $category->id],
            ['type', '=', $type],
            ['number', '=', $number],
        ])->firstOrFail();

        return view('client.film.watch', [
            'category' => $category,
            'franchise' => $category->franchise,
            'film' => $film,
        ]);
    }
}
