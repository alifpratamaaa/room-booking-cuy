<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class BookingModel extends Model
{
    public function allData()
   {
       //untuk menampilkan seluruh data, dengan query builder
        return DB::table('tbl_booking')
        ->leftJoin('tbl_room', 'tbl_room.id_room', '=', 'tbl_booking.id_room')
        ->leftJoin('users', 'users.id', '=', 'tbl_booking.id_user')
        ->get();
   }

   public function addData($data)
   {
     DB::table('tbl_booking')->insert($data);
   }

   public function approvedData($id_booking, $data)
   {
    DB::table('tbl_booking')->where('id_booking', $id_booking)->update($data);
   }

   public function rejectedData($id_booking, $data)
   {
    DB::table('tbl_booking')->where('id_booking', $id_booking)->update($data);
   }
   public function getDataBookingbyUser($id_user)
   {
      return DB::table('tbl_booking')
      ->leftJoin('tbl_room', 'tbl_room.id_room', '=', 'tbl_booking.id_room')
      ->leftJoin('users', 'users.id', '=', 'tbl_booking.id_user')
      ->where('id_user', $id_user)->get();
   }
   public function validasiBooking($id_room, $start_time, $end_time)
   {
      return DB::table('tbl_booking')
        ->whereRaw('id_room = ? and ((? BETWEEN start_time AND end_time) or (? BETWEEN start_time AND end_time)) AND status!= 2', 
          [$id_room, $start_time,  $end_time])->get();
   }
   public function viewdb()
   {
    return DB::table('dashboard')->get();
   }
}
