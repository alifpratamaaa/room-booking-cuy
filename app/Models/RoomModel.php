<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RoomModel extends Model
{
   public function allData()
   {
       //untuk menampilkan seluruh data, dengan query builder
        return DB::table('tbl_room')->get();
   }

   public function detailData($id_room)
   {
        return DB::table('tbl_room')->where('id_room', $id_room)->first();
   }

   public function addData($data)
   {
     DB::table('tbl_room')->insert($data);
   }

   public function editData($id_room, $data)
   {
     DB::table('tbl_room')->where('id_room', $id_room)->update($data);
   }

   public function deleteData($id_room)
   {
     DB::table('tbl_room')->where('id_room', $id_room)->delete();
   }
}
