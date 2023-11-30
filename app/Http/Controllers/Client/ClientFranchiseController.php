<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Franchise;
use App\Models\Category;
use Illuminate\Http\Request;

class ClientFranchiseController extends Controller
{
    public function index()
    {
        $franchises = Franchise::all();
        return view('client.franchise', compact('franchises'));
    }

    public function show(string $id)
    {
        $franchise = Franchise::findOrFail($id);
        $categories = Category::where('Franchise_id', $id)->get();
        return view('client.franchise-detail', compact('franchise', 'categories'));
    }
}
