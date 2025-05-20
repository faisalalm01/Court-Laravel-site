<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\CutiPegawai;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class DataCutiController extends Controller
{
    public function getPegawai()
    {

        $user = Auth::user();
        return  Pegawai::where('nip', $user->nip)->first();
    }
    public function showDataCutiDisetujui()
    {
        $pegawai = $this->getPegawai();
        $data =  CutiPegawai::where('id_pegawai', $pegawai->id_pegawai)->where('status_cuti', 'Disetujui')->get();
        return view('dashboard.user.data_cuti_disetujui', ['title' => 'Dashboard User | Data Cuti Disetujui', 'data' => $data]);
    }
    public function showDataCutiDitangguhkan()
    {
        $pegawai = $this->getPegawai();
        $data =  CutiPegawai::where('id_pegawai', $pegawai->id_pegawai)->where('status_cuti', 'Ditangguhkan')->get();
        return view('dashboard.user.data_cuti_ditangguhkan', ['title' => 'Dashboard User | Data Cuti Ditangguhkan', 'data' => $data]);
    }
    public function showDataCutiPerubahan()
    {
        $pegawai = $this->getPegawai();
        $data =  CutiPegawai::where('id_pegawai', $pegawai->id_pegawai)->where('status_cuti', 'Perubahan')->get();
        return view('dashboard.user.data_cuti_perubahan', ['title' => 'Dashboard User | Data Cuti Perubahan', 'data' => $data]);
    }
    public function showDataCutiTidakDisetujui()
    {
        $pegawai = $this->getPegawai();
        $data =  CutiPegawai::where('id_pegawai', $pegawai->id_pegawai)->where('status_cuti', 'Tidak Disetujui')->get();
        return view('dashboard.user.data_cuti_tidak_disetujui', ['title' => 'Dashboard User | Data Cuti Tidak Disetujui', 'data' => $data]);
    }
    public function cetakPdf()
    {
        $data =   [
            'nama' => 'ANNA SETYARINI',
            'nip' => '197201291994032003',
            'jabatan' => 'JURU SITA PENGGANTI',
            'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO',
            'jenis_cuti' => 'Cuti Tahunan',
            'alasan_cuti' => '1dada',
            'tanggal_mulai' => '2025-05-22',
            'tanggal_selesai' => '2025-05-31',
            'lama_cuti' => '1',
            'alamat' => 'Alamat selama cuti',
            'telepon' => '08123456789',
            'atasan' => 'HARIYANTO, S.H, M.H',
            'nip_atasan' => '196804101996031003',
            'ketua' => 'Richard E Basoeki, S.H, M.H.',
            'nip_ketua' => '123333333333232312332',
        ];
        $pdf = Pdf::loadView('pdf.cetak-cuti', $data);
        return $pdf->download('pengajuan_cuti.pdf');
    }
}
