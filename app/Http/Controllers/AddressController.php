<?php

namespace App\Http\Controllers;

use App\Models\AddressProvince;
use App\Models\AddressDetail;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        $provinces = AddressProvince::all();
        return view('client.address', compact('provinces'));
    }

    public function store(Request $request)
    {
        $address = new AddressDetail();
        $address->name = $request->name;
        $address->latitude = $request->latitude;
        $address->longitude = $request->longitude;
        $address->village_id = $request->village_id;
        $address->save();

        // dd($address);

        // return response()->json($address);
        return redirect()->route('client.address')->with('success', 'Alamat berhasil ditambahkan');
    }
}
