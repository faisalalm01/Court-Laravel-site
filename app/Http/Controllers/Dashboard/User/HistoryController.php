<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\CutiPegawai;
use App\Models\KgbPegawai;
use App\Models\KnpPegawai;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{

    public function getPegawai()
    {
        $user = Auth::user();
        return  Pegawai::where('nip', $user->nip)->first();
    }
    public function showDaftarCuti(Request $request)
    {
        $pegawai = $this->getPegawai();
        $tahunDipilih = $request->get('tahun', date('Y'));

        if ($tahunDipilih === 'all') {
            $data = CutiPegawai::where('id_pegawai', $pegawai->id_pegawai)->get();
        } else {
            $data = CutiPegawai::where('id_pegawai', $pegawai->id_pegawai)
                    ->whereYear('dari_tanggal', $tahunDipilih)
                    ->get();
        }

        // Ambil semua tahun unik dari data cuti
        $tahunList = CutiPegawai::where('id_pegawai', $pegawai->id_pegawai)
            ->selectRaw('YEAR(dari_tanggal) as tahun')
            ->distinct()
            ->pluck('tahun')
            ->sortDesc();

        return view('dashboard.user.daftar_cuti', [
            'title' => 'Dashboard User | Daftar Cuti',
            'data' => $data,
            'tahunList' => $tahunList,
            'tahunDipilih' => $tahunDipilih
        ]);
    }
    public function showDaftarKGB()
    {
        $pegawai = $this->getPegawai();
        $data =  KgbPegawai::where('id_pegawai', $pegawai->id_pegawai)->get();
        return view('dashboard.user.daftar_kgb', ['title' => 'Dashboard User | Daftar KGB', 'data' => $data]);
    }
    public function showDaftarKNP()
    {
        $pegawai = $this->getPegawai();
        $data =  KnpPegawai::where('id_pegawai', $pegawai->id_pegawai)->get();
        return view('dashboard.user.daftar_knp', ['title' => 'Dashboard User | Daftar KNP', 'data' => $data]);
    }
}
