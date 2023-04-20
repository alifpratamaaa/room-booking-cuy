<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomModel;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->RoomModel = new RoomModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'room' => $this->RoomModel->allData(),
        ];
        return view ('v_room', $data);
    }

    public function detail($id_room)
    {
        //manampilkan jika halaman tidak ada
        if (!$this->RoomModel->detailData($id_room)) {
            abort(404);
        }
        $data = [
            'room' => $this->RoomModel->detailData($id_room),
        ];
        return view ('v_detailroom', $data);
    }

    public function add()
    {
        return view('v_addroom');
    }

    public function insert()
    {
        //validasi
        Request()->validate([
            'room_name' => 'required|unique:tbl_room,room_name',
            'location' => 'required',
            'capacity' => 'required',
            'picture' => 'required|mimes:jpg,jpeg,bm,png|max:1024',
            'facility' => 'required',
        ],[
            'room_name.required' => 'The Room Name field is required !',
            'room_name.unique' => 'The Room Name already set !',
            'location.required' => 'The Location field is required !',
            'capacity.required' => 'The Capacity field is required !',
            'picture.required' => 'The Picture field is required !',
            'facility.required' => 'The Facility field is required !',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        //upload gambar/foto
        $file = Request()->picture;
        $fileName = Request()->room_name . '.' . $file->extension();
        $file->move(public_path('foto_room'), $fileName);
        
        $data = [
            'room_name' => Request()->room_name,
            'location' => Request()->location,
            'capacity' => Request()->capacity,
            'picture' => $fileName,
            'facility' => Request()->facility
        ];

        $this->RoomModel->addData($data);
        return redirect()->route('room')->with('pesan', 'Data added successfully !');
    }

    public function edit($id_room)
    {
        if (!$this->RoomModel->detailData($id_room)) {
            abort(404);
        }
        $data = [
            'room' => $this->RoomModel->detailData($id_room),
        ];
        return view('v_editroom', $data);
    }

    public function update($id_room)
    {
        //validasi
        Request()->validate([
            'room_name' => 'required',
            'location' => 'required',
            'capacity' => 'required',
            'picture' => 'mimes:jpg,jpeg,bm,png|max:1024',
            'facility' => 'required',
        ],[
            'room_name.required' => 'The Room Name field is required !',
            'location.required' => 'The Location field is required !',
            'capacity.required' => 'The Capacity field is required !',
            'facility.required' => 'The Facility field is required !',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        if (Request()->picture <> "") {
            //jika ingin ganti foto
              //upload gambar/foto
            $file = Request()->picture;
            $fileName = Request()->room_name . '.' . $file->extension();
            $file->move(public_path('foto_room'), $fileName);
            
            $data = [
                'room_name' => Request()->room_name,
                'location' => Request()->location,
                'capacity' => Request()->capacity,
                'picture' => $fileName,
                'facility' => Request()->facility
            ];
        $this->RoomModel->editData($id_room, $data);
        } else {
            //jika tidak ingin ganti foto
            $data = [
                'room_name' => Request()->room_name,
                'location' => Request()->location,
                'capacity' => Request()->capacity,
                'facility' => Request()->facility
            ];
            $this->RoomModel->editData($id_room, $data);
        }

        return redirect()->route('room')->with('pesan', 'Data update successfully !');
    }

    public function delete($id_room)
    {
        //hapus foto
        $room = $this->RoomModel->detailData($id_room);
        if ($room->picture <> "") {
            unlink(public_path('foto_room') . '/' . $room->picture);
        }

        $this->RoomModel->deleteData($id_room);
        return redirect()->route('room')->with('pesan', 'Data deleted successfully !');
    }
}
