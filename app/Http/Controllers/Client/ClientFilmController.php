<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Film;

class ClientFilmController extends Controller
{
    /**
     * Display a list of films for a category.
     *
     * @param string $franchise The slug of the franchise.
     * @param string $category The slug of the category.
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display a film for a category.
     *
     * @param string $franchise The slug of the franchise.
     * @param string $category The slug of the category.
     * @param string $type The type of the film.
     * @param int $number The number of the film.
     * @return \Illuminate\Http\Response
     */
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
