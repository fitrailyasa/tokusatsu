<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

class ClientBookmarkController extends Controller
{
    public function index()
    {
        return view('client.bookmark.index');
    }
}
