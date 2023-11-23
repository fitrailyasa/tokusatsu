<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Era;
use App\Models\Category;
use Illuminate\Http\Request;

class ClientEraController extends Controller
{
    public function index()
    {
        $eras = Era::latest('id')->get();
        return view('client.era', compact('eras'));
    }

    public function show(string $id)
    {
        $era = Era::findOrFail($id);
        $categories = Category::where('era_id', $id)->get();
        return view('client.era-detail', compact('era', 'categories'));
    }
}
