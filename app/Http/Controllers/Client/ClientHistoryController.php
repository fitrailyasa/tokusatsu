<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Franchise;

class ClientHistoryController extends Controller
{
    public function index()
    {
        $franchises = Franchise::withoutTrashed()->paginate(15);
        return view('client.history.index', compact('franchises'));
    }
}
