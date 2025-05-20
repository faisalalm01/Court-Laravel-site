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
    public function cetakPdf(string $cutiId)
    {
        $nip = $this->getPegawai()->nip;
        $pegawai = Pegawai::with('jabatan')->where('nip', $nip)->firstOrFail();
        $cutiPegawai = CutiPegawai::where('id_cutipegawai', $cutiId)
            ->where('status_cuti', 'Disetujui')
            ->first();
        if (!$cutiPegawai) {
            abort(404, 'Data cuti tidak ditemukan atau belum disetujui.');
        }
        $nipAtasan = $cutiPegawai->panitera_sekretaris ?? $cutiPegawai->panmud_kasubag;
        $atasan = Pegawai::with('jabatan')->where('nip', $nipAtasan)->first();
        $ketua = Pegawai::with('jabatan')->where('nip', $cutiPegawai->ketua)->first();
        $data = [
            'nama' => $pegawai->nama_pegawai,
            'nip' => $pegawai->nip,
            'jabatan' => $pegawai->jabatan->nama_jabatan,
            'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO',
            'jenis_cuti' => $cutiPegawai->jenis_cuti,
            'alasan_cuti' => $cutiPegawai->alasan_cuti,
            'tanggal_mulai' => $cutiPegawai->dari_tanggal,
            'tanggal_selesai' => $cutiPegawai->sampai_dengan,
            'lama_cuti' => $cutiPegawai->lama_cuti,
            'alamat' => $cutiPegawai->alamat ?? '-',
            'atasan' => $atasan->nama_pegawai ?? '-',
            'nip_atasan' => $atasan->nip ?? '-',
            'ketua' => $ketua->nama_pegawai ?? '-',
            'nip_ketua' => $ketua->nip ?? '-',
        ];
        $pdf = Pdf::loadView('pdf.cetak-cuti', $data);
        return $pdf->download('pengajuan_cuti.pdf');
    }
}
