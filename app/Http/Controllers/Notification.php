<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Notification extends Controller
{
    private function getPegawaiByJabatan(string $jabatan)
    {
        return Pegawai::whereHas('jabatan', function ($q) use ($jabatan) {
            $q->where('nama_jabatan', $jabatan);
        })->first();
    }
    public function markNotifRead($id)
    {
        Notification::where('id', $id)->update(['dibaca' => true]);
        return back();
    }
}
