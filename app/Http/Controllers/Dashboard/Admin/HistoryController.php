<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\CutiPegawai;
use App\Models\Golongan;
use App\Models\KgbPegawai;
use App\Models\KnpPegawai;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function showDaftarCuti()
    {
        $data =  CutiPegawai::all();
        return view('dashboard.admin.daftar_cuti', ['title' => 'Dashboard Admin | Daftar Cuti', 'data' => $data]);
    }
    public function showDaftarKGB()
    {

        $data =  KgbPegawai::all();
        $pegawai = Pegawai::all();
        return view('dashboard.admin.daftar_kgb', ['title' => 'Dashboard Admin | Daftar KGB', 'data' => $data, 'pegawai' => $pegawai]);
    }
    public function showDaftarKNP()
    {
        $data =  KnpPegawai::all();
        $golongan =  Golongan::all();
        $pegawai = Pegawai::all();
        return view('dashboard.admin.daftar_knp', ['title' => 'Dashboard Admin | Daftar KNP', 'data' => $data, 'golongan' => $golongan, 'pegawai' => $pegawai]);
    }
    public function addKNP(Request $request)
    {
        $data = $request->all();
        KnpPegawai::create([
            'id_pegawai' => $data['id_pegawai'],
            'knp_terakhir' => $data['knp_terakhir'],
            'knp_datang' => $data['knp_datang'],
            'keterangan' => $data['keterangan'],
            'pensiun' => $data['pensiun'],
            // 'timestamp' => now(),
        ]);
        return redirect()->route('dashboard.admin.daftar-knp')->with(['success' => 'Data KNP Berhasil Disimpan!']);
    }
    public function updateKnp(Request $request, $idKnppegawai)
    {
        $request->validate([
            'knp_terakhir' => 'required|date',
            'knp_datang' => 'required|date',
            'keterangan' => 'nullable|string',
            'pensiun' => 'nullable|date',
        ]);

        $data = KnpPegawai::where('id_knppegawai', $idKnppegawai)->first();

        if (!$data) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $data->knp_terakhir = $request->knp_terakhir;
        $data->knp_datang = $request->knp_datang;
        $data->keterangan = $request->keterangan;
        $data->pensiun = $request->pensiun;
        $data->save();

        return redirect()->back()->with('success', 'Data KNP berhasil diperbarui.');
    }

    public function deleteKnp($idKnppegawai)
    {
        // Cek jika data ditemukan
        $data = KnpPegawai::where('id_knppegawai', $idKnppegawai)->first();

        if ($data) {
            $data->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }
    }
}
