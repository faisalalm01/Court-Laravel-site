<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';
    protected $fillable = [
        'nama_pegawai', 'nip', 'id_jabatan', 'id_golongan', 'unit_kerja'
    ];

    // Relasi ke Jabatan
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan');
    }

    // Relasi ke Golongan
    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'id_golongan');
    }

    // Relasi ke CutiPegawai
    public function cutiPegawai()
    {
        return $this->hasMany(CutiPegawai::class, 'id_pegawai');
    }

    // Relasi ke KGB Pegawai
    public function kgbPegawai()
    {
        return $this->hasMany(KgbPegawai::class, 'id_pegawai');
    }

    // Relasi ke KNP Pegawai
    public function knpPegawai()
    {
        return $this->hasMany(KnpPegawai::class, 'id_pegawai');
    }
}

