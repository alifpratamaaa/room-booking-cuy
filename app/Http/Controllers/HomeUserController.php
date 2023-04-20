<?php

namespace App\Http\Controllers;
use App\Models\BookingModel;
use Illuminate\Http\Request;

class HomeUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->BookingModel = new BookingModel();
    }

    public function index()
    {
            $data = [
                'dashboarduser' => $this->BookingModel->allData(),
                'dashboardview' => $this->BookingModel->viewdb(),
            ];
        return view ('v_dashboarduser', $data);

       
    }
}
