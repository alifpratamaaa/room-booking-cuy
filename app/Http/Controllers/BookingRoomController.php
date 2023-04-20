<?php

namespace App\Http\Controllers;
use App\Models\BookingModel;
use App\Models\RoomModel;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class BookingRoomController extends Controller
{
    public function __construct()
    {
        $this->BookingModel = new BookingModel();
        $this->RoomModel = new RoomModel();
    }

    public function index()
    {
        if ( Auth::user()->level == 1){
            $data = [
                'bookingroom' => $this->BookingModel->allData(),
            ];
        } else {
            $data = [
                'bookingroom' => $this->BookingModel->getDataBookingbyUser(Auth::user()->id),
            ];
        }
        return view ('v_bookingroom', $data);
    }

    public function add()
    {
        $data = [
            'room' => $this->RoomModel->allData(),
        ];
        return view('v_addbookingroom', $data);
    }

    public function insert()
    {
        if (count($this->BookingModel->validasiBooking(Request()->id_room, Request()->start_time, Request()->end_time)) > 0) {
            return redirect()->route('bookingroomadd')->with('error', 'Data already exist in database !');
        }
        // exit('2');
        //validasi
        Request()->validate([
            'id_room' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'purpose' => 'required',
        ],[
            'id_room.required' => 'The Room Name field is required !',
            'start_time.required' => 'The start date time field is required !',
            'end_time.required' => 'The end date time field is required !',
            'purpose.required' => 'The purpose field is required !',
        ]);

        $data = [
            'id_room' => Request()->id_room,
            'start_time' => Request()->start_time,
            'end_time' => Request()->end_time,
            'purpose' => Request()->purpose,
            'id_user' => Auth::user()->id
        ];

        $this->BookingModel->addData($data);
        return redirect()->route('bookingroom')->with('pesan', 'Data added successfully !');
    
    }

   
}
