<?php

namespace App\Exports;

use App\Models\BookingModel;
use App\Models\Report;
use Illuminate\Contracts\View\View; //Harus diimport untuk men-convert blade menjadi file excel
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;

class ReportExport implements FromView
{
        public function view(): View
        {
            //export adalah file export.blade.php yang ada di folder views
            return view('v_report', [
                //data adalah value yang akan kita gunakan pada blade nanti
                //User::all() mengambil seluruh data user dan disimpan pada variabel data
                'data' => DB::table('tbl_booking')
            ]);
        }
}
