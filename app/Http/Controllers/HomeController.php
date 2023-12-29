<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $datas = Data::all();
        $categories = Category::all();
        return view('client.index', compact('datas', 'categories'));
    }

    public function search(Request $request)
    {
        $validatedData = $request->validate([
            'query' => 'required|string|max:255',
        ]);

        $query = '%' . $validatedData['query'] . '%';

        $datas = Data::where('name', 'like', $query)
            ->orWhere('img', 'like', $query)
            ->orWhere('category_id', 'like', $query)
            ->paginate(10);

        return view('client.search', compact('datas'));
    }

}
