<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CutiHistory extends Model
{
    use HasFactory;

    protected $table = 'cuti_history';

    protected $fillable = [
        'id_pegawai',
        'tahun',
        'jatah_tahunan',
        'terpakai_tahunan',
        'cuti_besar',
        'cuti_sakit',
        'cuti_melahirkan',
        'cuti_alasan_penting',
        'cuti_diluar_tanggungan',
        'sisa_tahun_lalu',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id_pegawai');
    }

    // Sisa cuti tahunan yang bisa digabung maksimal 24 hari
    public function getSisaTahunanAttribute()
    {
        return max(0, $this->jatah_tahunan - $this->terpakai_tahunan);
    }

    public function getTotalSisaAttribute()
    {
        $total = ($this->sisa_tahun_lalu ?? 0) + $this->sisa_tahunan;
        return $total > 24 ? 24 : $total;
    }

    public static function getSisaCutiTahunan($idPegawai)
    {
        $tahunIni = now()->year;
        $tahunLalu = $tahunIni - 1;

        $cutiIni = self::where('id_pegawai', $idPegawai)
            ->where('tahun', $tahunIni)
            ->where('jenis_cuti', 'Cuti Tahunan')
            ->first();

        $cutiLalu = self::where('id_pegawai', $idPegawai)
            ->where('tahun', $tahunLalu)
            ->where('jenis_cuti', 'Cuti Tahunan')
            ->first();

        $sisaIni = $cutiIni ? max(0, $cutiIni->jatah - $cutiIni->terpakai) : 0;
        $sisaLalu = $cutiLalu ? max(0, $cutiLalu->jatah - $cutiLalu->terpakai) : 0;

        // Total gabungan maksimal 24 hari
        $total = $sisaIni + $sisaLalu;
        return min($total, 24);
    }
}
