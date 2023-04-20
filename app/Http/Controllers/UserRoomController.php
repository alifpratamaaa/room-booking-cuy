<?php

namespace App\Http\Controllers;
use App\Models\RoomModel;

use Illuminate\Http\Request;

class UserRoomController extends Controller
{
    public function __construct()
    {
        $this->RoomModel = new RoomModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'userroom' => $this->RoomModel->allData(),
        ];
        return view ('v_userroom', $data);
    }
}
