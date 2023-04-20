<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class UserController extends Controller
{
    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->middleware('auth');
    }
    public function index()
    {
        $data = [
            'user' => $this->UserModel->allData(),
        ];
        return view ('v_user', $data);
    }

    public function edit($id)
    {
        if (!$this->UserModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'user' => $this->UserModel->detailData($id),
        ];
        return view('v_edituser', $data);
    }

    public function update($id)
    {
        //validasi
        Request()->validate([
            'name' => 'required',
            'email' => 'required',
            'department' => 'required',
        ],[
            'name.required' => 'The Name field is required !',
            'email.required' => 'The Email field is required !',
            'department.required' => 'The Department field is required !',
        ]);
            
            $data = [
                'name' => Request()->name,
                'email' => Request()->email,
                'department' => Request()->department,
            ];
            $this->UserModel->editData($id, $data);

        return redirect()->route('user')->with('pesan', 'Data update successfully !');
    }

    public function delete($id)
    {
        $this->UserModel->deleteData($id);
        return redirect()->route('user')->with('pesan', 'Data deleted successfully !');
    }
    
}
