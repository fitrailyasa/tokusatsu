<?php

namespace App\Traits;

use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

trait Exportable
{
    public function exportExcelFile($exportClass, $filename)
    {
        return Excel::download(
            new $exportClass,
            $filename
        );
    }

    public function exportPdfFile($view, $data, $filename)
    {
        $pdf = Pdf::loadView($view, $data);

        return $pdf->stream($filename);
    }
}
