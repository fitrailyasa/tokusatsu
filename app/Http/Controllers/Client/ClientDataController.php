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
        $datas = Data::latest('id')->get();
        return view('client.data', compact('datas'));
    }

}
