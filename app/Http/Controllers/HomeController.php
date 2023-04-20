<?php

namespace App\Http\Controllers;
use App\Models\BookingModel;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->BookingModel = new BookingModel();
    }

    public function index()
    {
        $data = [
            'dashboard' => $this->BookingModel->allData(),
            'dashboardview' => $this->BookingModel->viewdb(),
        ];
        return view ('v_dashboard', $data);
    }

}
