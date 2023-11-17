<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Category;
use Illuminate\Http\Request;

class ClientDataController extends Controller
{
    public function index()
    {
        $datas = Data::all();
        return view('client.index', compact('datas'));
    }

}
