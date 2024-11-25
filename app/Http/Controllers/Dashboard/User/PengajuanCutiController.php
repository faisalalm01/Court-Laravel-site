<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\TambahPengajuanCutiRequest;
use App\Models\CutiPegawai;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanCutiController extends Controller
{
    public function getPegawai()
    {
        $user = Auth::user();
        return  Pegawai::where('nip', $user->nip)->first();
    }
    public function showDaftarApproval()
    {
        $pegawai = $this->getPegawai();
        $data =  CutiPegawai::where('id_pegawai', $pegawai->id_pegawai)->where('status_cuti', 'Diajukan')->get();
        return view('dashboard.user.daftar_aproval', ['title' => 'Dashbaord User | Daftar Approval', 'data' => $data]);
    }
    public function showTambahPengajuanCuti()
    {

        return view('dashboard.user.pengajuan_cuti');
    }

    public function tambahPengajuanCuti(TambahPengajuanCutiRequest $request)
    {
        $data = $request->all();
        $pegawai = $this->getPegawai();
        if ($data['atasan'] === 'panitera') {
            $panitera  =  '196804101996031003';
            CutiPegawai::create([
                'id_pegawai' => $pegawai->id_pegawai,
                'jenis_cuti' => $data['jenis_cuti'],
                'alasan_cuti' => $data['alasan_cuti'],
                'lama_cuti' => $data['lama_cuti'],
                'ket_lama_cuti' => $data['ket_lamacuti'],
                'dari_tanggal' => $data['dari_tanggal'],
                'sampai_dengan' => $data['sampai_dengan'],
                'panmud_kasubag' => null,
                'panitera_sekretaris' => $panitera,
                'ketua' => null,
                'app_panmud_kasubag' => 1,
                'app_panitera_sekretaris' => 0,
                'app_ketua' => 0,
                'status_cuti' => 'Diajukan',
                'ket_status_cuti' => 'Menunggu Approval Panitera',
            ]);
        } else if ($data['atasan'] === 'sekretaris') {
            $sekretaris = '196609241986032001';
            CutiPegawai::create([
                'id_pegawai' => $pegawai->id_pegawai,
                'jenis_cuti' => $data['jenis_cuti'],
                'alasan_cuti' => $data['alasan_cuti'],
                'lama_cuti' => $data['lama_cuti'],
                'ket_lama_cuti' => $data['ket_lamacuti'],
                'dari_tanggal' => $data['dari_tanggal'],
                'sampai_dengan' => $data['sampai_dengan'],
                'panmud_kasubag' => null,
                'panitera_sekretaris' => $sekretaris,
                'ketua' => null,
                'app_panmud_kasubag' => 1,
                'app_panitera_sekretaris' => 0,
                'app_ketua' => 0,
                'status_cuti' => 'Diajukan',
                'ket_status_cuti' => 'Menunggu Approval Sekretaris',
            ]);
        } else if ($data['atasan'] === 'ketualangsung') {
            CutiPegawai::create([
                'id_pegawai' => $pegawai->id_pegawai,
                'jenis_cuti' => $data['jenis_cuti'],
                'alasan_cuti' => $data['alasan_cuti'],
                'lama_cuti' => $data['lama_cuti'],
                'ket_lama_cuti' => $data['ket_lamacuti'],
                'dari_tanggal' => $data['dari_tanggal'],
                'sampai_dengan' => $data['sampai_dengan'],
                'panmud_kasubag' => null,
                'panitera_sekretaris' => null,
                'ketua' => null,
                'app_panmud_kasubag' => 1,
                'app_panitera_sekretaris' => 0,
                'app_ketua' => 0,
                'status_cuti' => 'Disetujui',
                'ket_status_cuti' => 'Pengajuan Cuti Disetujui',
            ]);
        } else if ($data['atasan'] === 'ketua') {
            $ketua = '197610182001121002';
            CutiPegawai::create([
                'id_pegawai' => $pegawai->id_pegawai,
                'jenis_cuti' => $data['jenis_cuti'],
                'alasan_cuti' => $data['alasan_cuti'],
                'lama_cuti' => $data['lama_cuti'],
                'ket_lama_cuti' => $data['ket_lamacuti'],
                'dari_tanggal' => $data['dari_tanggal'],
                'sampai_dengan' => $data['sampai_dengan'],
                'panmud_kasubag' => null,
                'panitera_sekretaris' => null,
                'ketua' => $ketua,
                'app_panmud_kasubag' => 1,
                'app_panitera_sekretaris' => 1,
                'app_ketua' => 0,
                'status_cuti' => 'Diajukan',
                'ket_status_cuti' => 'Menunggu Approval Ketua',
            ]);
        } else if ($data['atasan'] === 'panmudhukum') {
            $panmud = '197106161996031002';
            CutiPegawai::create([
                'id_pegawai' => $pegawai->id_pegawai,
                'jenis_cuti' => $data['jenis_cuti'],
                'alasan_cuti' => $data['alasan_cuti'],
                'lama_cuti' => $data['lama_cuti'],
                'ket_lama_cuti' => $data['ket_lamacuti'],
                'dari_tanggal' => $data['dari_tanggal'],
                'sampai_dengan' => $data['sampai_dengan'],
                'panmud_kasubag' => $panmud,
                'panitera_sekretaris' => null,
                'ketua' => null,
                'app_panmud_kasubag' => 0,
                'app_panitera_sekretaris' => 0,
                'app_ketua' => 1,
                'status_cuti' => 'Diajukan',
                'ket_status_cuti' => 'Menunggu Approval Panmud Hukum',
            ]);
        } else if ($data['atasan'] === 'panmudgugatan') {
            $panmud = '197308131995031001';
            CutiPegawai::create([
                'id_pegawai' => $pegawai->id_pegawai,
                'jenis_cuti' => $data['jenis_cuti'],
                'alasan_cuti' => $data['alasan_cuti'],
                'lama_cuti' => $data['lama_cuti'],
                'ket_lama_cuti' => $data['ket_lamacuti'],
                'dari_tanggal' => $data['dari_tanggal'],
                'sampai_dengan' => $data['sampai_dengan'],
                'panmud_kasubag' => $panmud,
                'panitera_sekretaris' => null,
                'ketua' => null,
                'app_panmud_kasubag' => 0,
                'app_panitera_sekretaris' => 0,
                'app_ketua' => 1,
                'status_cuti' => 'Diajukan',
                'ket_status_cuti' => 'Menunggu Approval Panmud Gugatan',
            ]);
        } else if ($data['atasan'] === 'panmudpermohonan') {
            $panmud = '197110272001121001';
            CutiPegawai::create([
                'id_pegawai' => $pegawai->id_pegawai,
                'jenis_cuti' => $data['jenis_cuti'],
                'alasan_cuti' => $data['alasan_cuti'],
                'lama_cuti' => $data['lama_cuti'],
                'ket_lama_cuti' => $data['ket_lamacuti'],
                'dari_tanggal' => $data['dari_tanggal'],
                'sampai_dengan' => $data['sampai_dengan'],
                'panmud_kasubag' => $panmud,
                'panitera_sekretaris' => null,
                'ketua' => null,
                'app_panmud_kasubag' => 0,
                'app_panitera_sekretaris' => 0,
                'app_ketua' => 1,
                'status_cuti' => 'Diajukan',
                'ket_status_cuti' => 'Menunggu Approval Panmud Permohonan',
            ]);
        } else if ($data['atasan'] === 'kasubagortala') {
            $kasubag = '198509182009042006';
            CutiPegawai::create([
                'id_pegawai' => $pegawai->id_pegawai,
                'jenis_cuti' => $data['jenis_cuti'],
                'alasan_cuti' => $data['alasan_cuti'],
                'lama_cuti' => $data['lama_cuti'],
                'ket_lama_cuti' => $data['ket_lamacuti'],
                'dari_tanggal' => $data['dari_tanggal'],
                'sampai_dengan' => $data['sampai_dengan'],
                'panmud_kasubag' => $kasubag,
                'panitera_sekretaris' => null,
                'ketua' => null,
                'app_panmud_kasubag' => 0,
                'app_panitera_sekretaris' => 0,
                'app_ketua' => 1,
                'status_cuti' => 'Diajukan',
                'ket_status_cuti' => 'Menunggu Approval Kasubag Kepegawaian dan Ortala',
            ]);
        } else if ($data['atasan'] === 'kasubagit') {
            $kasubag = '197609072006041006';
            CutiPegawai::create([
                'id_pegawai' => $pegawai->id_pegawai,
                'jenis_cuti' => $data['jenis_cuti'],
                'alasan_cuti' => $data['alasan_cuti'],
                'lama_cuti' => $data['lama_cuti'],
                'ket_lama_cuti' => $data['ket_lamacuti'],
                'dari_tanggal' => $data['dari_tanggal'],
                'sampai_dengan' => $data['sampai_dengan'],
                'panmud_kasubag' => $kasubag,
                'panitera_sekretaris' => null,
                'ketua' => null,
                'app_panmud_kasubag' => 0,
                'app_panitera_sekretaris' => 0,
                'app_ketua' => 1,
                'status_cuti' => 'Diajukan',
                'ket_status_cuti' => 'Menunggu Approval Kasubag Perencanaan, IT dan Pelaporan',
            ]);
        } else if ($data['atasan'] === 'kasubagkeuangan') {
            $kasubag = '197004081994032003';
            CutiPegawai::create([
                'id_pegawai' => $pegawai->id_pegawai,
                'jenis_cuti' => $data['jenis_cuti'],
                'alasan_cuti' => $data['alasan_cuti'],
                'lama_cuti' => $data['lama_cuti'],
                'ket_lama_cuti' => $data['ket_lamacuti'],
                'dari_tanggal' => $data['dari_tanggal'],
                'sampai_dengan' => $data['sampai_dengan'],
                'panmud_kasubag' => $kasubag,
                'panitera_sekretaris' => null,
                'ketua' => null,
                'app_panmud_kasubag' => 0,
                'app_panitera_sekretaris' => 0,
                'app_ketua' => 1,
                'status_cuti' => 'Diajukan',
                'ket_status_cuti' => 'Menunggu Approval Kasubag Umum dan Keuangan',
            ]);
        }
        return redirect()->route('dashboard.user.daftar-approval')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}
