<?php

namespace App\Http\Controllers;

use App\Exports\ReportExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\BookingModel;
use Illuminate\Http\Request;
use PDF;
use PhpOffice\PhpSpreadsheet\Writer\Pdf as WriterPdf;

class ReportController extends Controller
{
    public function index()
    {
    }
    

    public function export() 
    {
        return Excel::download(new ReportExport, 'report.xlsx');
    }
}
