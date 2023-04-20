<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\changePasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ChangePassUserController extends Controller
{
    public function index()
    {
        return view('v_changepassworduser');
    }

    public function update(changePasswordRequest $request)
    {
        $old_password = auth()->user()->password;
        $id_user      = auth()->user()->id;

        if (Hash::check($request->input('old_password'), $old_password)){
            $user = User::find($id_user);

            $user->password = Hash::make($request->input('password'));

            if ($user->save()){
                return redirect()->back()->with('success', 'change password successful');
            }else{
                return redirect()->back()->with('failed', 'change password invalid');
            }
        }else{
            return redirect()->back()->with('failed', 'old password invalid');
        }
    }


}
