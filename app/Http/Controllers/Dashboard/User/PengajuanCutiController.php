<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\TambahPengajuanCutiRequest;
use App\Models\CutiPegawai;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CutiHistory;
use App\Helpers\FlowPengajuanCuti;
use App\Models\Notification;
use Illuminate\Support\Str;

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
        return view('dashboard.user.daftar_aproval', ['title' => 'Dashboard User | Daftar Approval', 'data' => $data]);
    }
    public function showTambahPengajuanCuti()
    {
        $pegawai = $this->getPegawai();

        $masihAktif = CutiPegawai::where('id_pegawai', $pegawai->id_pegawai)
            ->whereIn('status_cuti', ['Diajukan', 'Disetujui'])
            ->whereDate('sampai_dengan', '>=', now())
            ->exists();

        $cutiTahunan = CutiHistory::where('id_pegawai', $pegawai->id_pegawai)
            ->where('tahun', now()->year)
            ->where('jenis_cuti', 'Tahunan')
            ->first();

        $terpakai = $cutiTahunan?->terpakai ?? 0;
        $sisaCuti = max(0, 12 - $terpakai);

        return view('dashboard.user.pengajuan_cuti', [
            'title' => 'Form Pengajuan Cuti',
            'pegawai' => $pegawai,
            'masihAktif' => $masihAktif,
            'sisaCuti' => $sisaCuti,
        ]);
    }


    public function tambahPengajuanCuti(TambahPengajuanCutiRequest $request)
    {
        $data = $request->all();
        $pegawai = $this->getPegawai();

        // Validasi tambahan jika cuti melebihi sisa
        $cutiTahunan = CutiHistory::where('id_pegawai', $pegawai->id_pegawai)
            ->where('tahun', now()->year)
            ->where('jenis_cuti', 'Tahunan')
            ->first();

        $terpakai = $cutiTahunan?->terpakai ?? 0;
        $sisaCuti = max(0, 12 - $terpakai);

        if ($request->jenis_cuti === 'Tahunan' && $request->lama_cuti > $sisaCuti) {
            return redirect()->back()->withInput()->withErrors([
                'lama_cuti' => 'Jumlah hari cuti melebihi sisa cuti tahunan Anda.'
            ]);
        }
        $atasan = FlowPengajuanCuti::getFirstApproval($pegawai);

        $approvalFields = [
            'panmud_kasubag' => null,
            'panitera_sekretaris' => null,
            'ketua' => null,
            'app_panmud_kasubag' => 0,
            'app_panitera_sekretaris' => 0,
            'app_ketua' => 0,
            'status_cuti' => 'Diajukan',
            'ket_status_cuti' => $atasan
                ? 'Menunggu Approval ' .  Str::title(strtolower($atasan->jabatan->nama_jabatan))
                : 'Disetujui', // kalau tidak ada atasan lagi, langsung disetujui
        ];
        if ($atasan) {
            $jabatanAtasan = strtoupper($atasan->jabatan->nama_jabatan);

            if (str_contains($jabatanAtasan, 'PANMUD') || str_contains($jabatanAtasan, 'KASUBAG')) {
                $approvalFields['panmud_kasubag'] = $atasan->nip;
            } elseif ($jabatanAtasan === 'SEKRETARIS' || $jabatanAtasan === 'PANITERA') {
                $approvalFields['panitera_sekretaris'] = $atasan->nip;
                $approvalFields['app_panmud_kasubag'] = 1; // auto approve level bawah
            } elseif ($jabatanAtasan === 'KETUA') {
                $approvalFields['ketua'] = $atasan->nip;
                $approvalFields['app_panmud_kasubag'] = 1;
                $approvalFields['app_panitera_sekretaris'] = 1;
            }
        } else {
            $approvalFields['status_cuti'] = 'Disetujui';
            $approvalFields['ket_status_cuti'] = 'Pengajuan Cuti Disetujui';
            $cutiHistory = CutiHistory::firstOrCreate(
                [
                    'id_pegawai' => $pegawai->id_pegawai,
                    'tahun' => now()->year,
                    'jenis_cuti' => 'Tahunan',
                ],
                [
                    'terpakai' => 0,
                ]
            );
            $cutiHistory->increment('terpakai', $data['lama_cuti']);
        }
        $cuti =  CutiPegawai::create(array_merge([
            'id_pegawai' => $pegawai->id_pegawai,
            'jenis_cuti' => $data['jenis_cuti'],
            'alasan_cuti' => $data['alasan_cuti'],
            'lama_cuti' => $data['lama_cuti'],
            'ket_lama_cuti' => $data['ket_lamacuti'],
            'dari_tanggal' => $data['dari_tanggal'],
            'sampai_dengan' => $data['sampai_dengan'],
            'alamat' => $data['alamat'],
        ], $approvalFields));

        Notification::create([
            'id_user'   => $atasan->user->id_user,
            'id_pegawai' => $pegawai->id_pegawai,
            'id_cutipegawai'   => $cuti->id_cutipegawai,
            'tipe'      => 'pengajuan_cuti',
            'pesan'      => "{$pegawai->nama_pegawai} mengajukan " . strtolower($data['jenis_cuti']) . " selama {$data['lama_cuti']} hari. Menunggu persetujuan Anda.",
        ]);
        // hitung total pegawai aktif di jabatan tsb
        $totalPegawai = Pegawai::whereHas('user', fn($q) => $q->where('status', 'active'))
            ->whereHas('jabatan', fn($q) => $q->where('nama_jabatan', $pegawai->jabatan->nama_jabatan))
            ->count();
        // hitung yg sedang cuti aktif
        $sedangCuti = CutiPegawai::whereHas('pegawai.user', fn($q) => $q->where('status', 'active'))
            ->whereHas('pegawai.jabatan', fn($q) => $q->where('nama_jabatan', $pegawai->jabatan->nama_jabatan))
            ->where('status_cuti', 'Disetujui')
            ->whereDate('dari_tanggal', '<=', now())
            ->whereDate('sampai_dengan', '>=', now())
            ->count();

        $persentase = $totalPegawai > 0 ? ($sedangCuti / $totalPegawai) * 100 : 0;
        if ($persentase > 50) {
            $ketua = Pegawai::whereHas('jabatan', fn($q) => $q->where('nama_jabatan', 'KETUA'))
                ->with('user')
                ->first();
            if ($ketua && $ketua->user) {
                Notification::create([
                    'id_user'        => $ketua->user->id_user,
                    'id_pegawai'     => $ketua->id_pegawai,
                    'tipe'           => 'batasan_cuti',
                    'pesan'          => "Lebih dari 50% pegawai dengan jabatan {$pegawai->jabatan->nama_jabatan} sedang cuti.",
                ]);
            }
        }
        return redirect()->route('dashboard.user.daftar-approval')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}
