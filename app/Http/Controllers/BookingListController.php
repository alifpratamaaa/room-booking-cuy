<?php

namespace App\Http\Controllers;
use App\Models\BookingModel;
use Barryvdh\DomPDF\Facade\pdf;


use Illuminate\Http\Request;

class BookingListController extends Controller
{
    public function __construct()
    {
        $this->BookingModel = new BookingModel();
    }

    public function index()
    {
        
        $data = [
            'bookinglist' => $this->BookingModel->allData(),
        ];
        return view ('v_bookinglist', $data);
    }

    public function approved($id_booking)
    {
        $data = [
            'status' => 1,
        ];
        $this->BookingModel->approvedData($id_booking, $data);
        $data = [
            'bookinglist' => $this->BookingModel->allData(),
        ];
        return view ('v_bookinglist', $data);
    }

    public function rejected($id_booking)
    {
        $data = [
            'status' => 2,
        ];
        $this->BookingModel->rejectedData($id_booking, $data);
        $data = [
            'bookinglist' => $this->BookingModel->allData(),
        ];
        return view ('v_bookinglist', $data);
    }

    public function exportpdf()
    {
        $data = [
            'bookinglist' => $this->BookingModel->allData(),
        ];
        view()->share('bookinglist', $data);
        $pdf = PDF::loadview('v_bookinglist-pdf', $data);
        return $pdf->download('report.pdf');

    }
}
