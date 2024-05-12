<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Franchise;
use App\Models\Category;
use Illuminate\Http\Request;

class ClientFranchiseController extends Controller
{
    public function index()
    {
        $franchises = Franchise::paginate(10);
        return view('client.franchise.index', compact('franchises'));
    }

    public function show(string $id)
    {
        $franchise = Franchise::findOrFail($id);
        $categories = Category::where('franchise_id', $id)->paginate(10);
        return view('client.franchise.show', compact('franchise', 'categories'));
    }

    public function category(string $id)
    {
        $datas = Data::where('category_id', $id)->get();
        $category = Category::findOrFail($id);
        $franchise = Franchise::findOrFail($category->franchise_id);
        return view('client.franchise.category-detail', compact('datas', 'category', 'franchise'));
    }

}
