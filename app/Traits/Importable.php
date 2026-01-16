<?php

namespace App\Traits;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

trait Importable
{
    public function importExcelFile(Request $request, $importClass)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls|max:10240',
        ]);

        Excel::import(
            new $importClass,
            $request->file('file')
        );

        return back()->with('success', 'Successfully import data!');
    }
}
