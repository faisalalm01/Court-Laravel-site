<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pegawai;
use App\Models\CutiHistory;

class CutiHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pegawaiList = Pegawai::all();
        $tahun = now()->year;

        $defaultCuti = [
            ['jenis_cuti' => 'Tahunan', 'jatah' => 12],
            ['jenis_cuti' => 'Besar', 'jatah' => 90],
            ['jenis_cuti' => 'Sakit', 'jatah' => 365],
            ['jenis_cuti' => 'Alasan Penting', 'jatah' => 60],
            ['jenis_cuti' => 'Bersama', 'jatah' => 0],
            ['jenis_cuti' => 'Luar Tanggungan', 'jatah' => 1095],
        ];

        foreach ($pegawaiList as $pegawai) {
            foreach ($defaultCuti as $cuti) {
                CutiHistory::updateOrCreate(
                    [
                        'id_pegawai' => $pegawai->id_pegawai,
                        'tahun' => $tahun,
                        'jenis_cuti' => $cuti['jenis_cuti']
                    ],
                    [
                        'jatah' => $cuti['jatah'],
                        'terpakai' => 0,
                    ]
                );
            }

            // Tambahkan cuti melahirkan hanya untuk pegawai perempuan
            if ($pegawai->jenis_kelamin === 'P') {
                CutiHistory::updateOrCreate(
                    [
                        'id_pegawai' => $pegawai->id_pegawai,
                        'tahun' => $tahun,
                        'jenis_cuti' => 'Melahirkan'
                    ],
                    [
                        'jatah' => 90, // 3 bulan
                        'terpakai' => 0,
                    ]
                );
            }
        }
    }
}
