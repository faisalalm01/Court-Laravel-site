<?php

namespace App\Helpers;

use App\Models\Pegawai;
use Illuminate\Support\Str;

class FlowPengajuanCuti
{
    private static $flow = [
        'STAFF PELAKSANA PERNCANAAN, IT DAN PELAPORAN' => ['KASUBAG PERNCANAAN, IT DAN PELAPORAN', 'KETUA'],
        'STAFF PELAKSANA KEPEGAWAIAN DAN ORTALA'       => ['KASUBAG KEPEGAWAIAN DAN ORTALA', 'KETUA'],
        'STAFF PELAKSANA UMUM DAN KEUANGAN'            => ['KASUBAG UMUM DAN KEUANGAN', 'KETUA'],
        'STAFF PELAKSANA PRAKOM'                       => ['KASUBAG PERNCANAAN, IT DAN PELAPORAN', 'KETUA'],
        'KASUBAG PERNCANAAN, IT DAN PELAPORAN' => ['SEKRETARIS', 'KETUA'],
        'KASUBAG KEPEGAWAIAN DAN ORTALA'       => ['SEKRETARIS', 'KETUA'],
        'KASUBAG UMUM DAN KEUANGAN'            => ['SEKRETARIS', 'KETUA'],
        'STAFF PELAKSANA PANMUD HUKUM'       => ['PANMUD HUKUM', 'PANITERA', 'KETUA'],
        'STAFF PELAKSANA PANMUD GUGATAN'     => ['PANMUD GUGATAN', 'PANITERA', 'KETUA'],
        'STAFF PELAKSANA PANMUD PERMOHONAN'  => ['PANMUD PERMOHONAN', 'PANITERA', 'KETUA'],
        'PANMUD HUKUM'       => ['PANITERA', 'KETUA'],
        'PANMUD GUGATAN'     => ['PANITERA', 'KETUA'],
        'PANMUD PERMOHONAN'  => ['PANITERA', 'KETUA'],
        'PANITERA PENGGANTI'   => ['PANITERA', 'KETUA'],
        'JURU SITA'            => ['PANITERA', 'KETUA'],
        'JURU SITA PENGGANTI'  => ['PANITERA', 'KETUA'],
        'PANITERA'             => ['KETUA'],
        'WAKIL KETUA'        => ['KETUA'],
        'HAKIM UTAMA MUDA'   => ['KETUA'],
        'HAKIM MADYA UTAMA'  => ['KETUA'],
        'SEKRETARIS' => ['KETUA'],
        'KETUA' => [],
    ];

    public static function getFlow(string $jabatan): array
    {
        return self::$flow[$jabatan] ?? [];
    }

    private static function getFirst(string $jabatan): ?string
    {
        return self::$flow[$jabatan][0] ?? null;
    }


    public static function getFirstApproval(Pegawai $pegawai): ?Pegawai
    {
        $jabatan = $pegawai->jabatan->nama_jabatan;
        $nextJabatan = self::getFirst($jabatan);

        if (!$nextJabatan) {
            return null;
        }

        return Pegawai::whereHas('user')
            ->whereHas('jabatan', function ($q) use ($nextJabatan) {
                $q->where('nama_jabatan', $nextJabatan);
            })
            ->first();
    }

    public static function getNext(string $jabatanPemohon, string $jabatanApprover): ?string
    {
        $flow = self::$flow[$jabatanPemohon] ?? [];

        $index = array_search($jabatanApprover, $flow);

        if ($index === false) {
            return $flow[0] ?? null;
        }

        return $flow[$index + 1] ?? null;
    }

    public static function getNextApproval(Pegawai $pemohon, string $jabatanApprover): ?Pegawai
    {
        $jabatanPemohon = $pemohon->jabatan->nama_jabatan;
        $nextJabatan = self::getNext($jabatanPemohon, $jabatanApprover);

        if (!$nextJabatan) {
            return null;
        }

        return Pegawai::whereHas('user')
            ->whereHas('jabatan', function ($q) use ($nextJabatan) {
                $q->where('nama_jabatan', $nextJabatan);
            })
            ->first();
    }


    public static function mapJabatanToField(string $jabatan): array
    {
        $jabatan = strtoupper($jabatan);

        if (in_array($jabatan, [
            'PANMUD HUKUM',
            'PANMUD GUGATAN',
            'PANMUD PERMOHONAN',
            'KASUBAG KEPEGAWAIAN DAN ORTALA',
            'KASUBAG PERNCANAAN, IT DAN PELAPORAN',
            'KASUBAG UMUM DAN KEUANGAN',
        ])) {
            return ['app_field' => 'app_panmud_kasubag', 'user_field' => 'panmud_kasubag'];
        }

        if (in_array($jabatan, ['PANITERA', 'SEKRETARIS'])) {
            return ['app_field' => 'app_panitera_sekretaris', 'user_field' => 'panitera_sekretaris'];
        }

        if ($jabatan === 'KETUA') {
            return ['app_field' => 'app_ketua', 'user_field' => 'ketua'];
        }

        return [
            'app_field'  => 'app_' . Str::snake(strtolower($jabatan)),
            'user_field' => Str::snake(strtolower($jabatan)),
        ];
    }
}
