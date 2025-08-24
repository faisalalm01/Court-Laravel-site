<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $primaryKey = 'nip';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'pegawai';
    protected $fillable = [
        'nama_pegawai',
        'nip',
        'id_jabatan',
        'id_golongan',
        'unit_kerja',
        'jenis_kelamin'
    ];

    public function pegawai()
    {
        return $this->hasOne(Pegawai::class, 'nip', 'nip');
    }

    // Relasi ke Jabatan
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan', 'id_jabatan');
    }

    // Relasi ke Golongan
    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'id_golongan', 'id_golongan');
    }

    // Relasi ke CutiPegawai
    public function cutiPegawai()
    {
        return $this->hasMany(CutiPegawai::class, 'id_pegawai', 'id_pegawai');
    }

    // Relasi ke KGB Pegawai
    public function kgbPegawai()
    {
        return $this->hasMany(KgbPegawai::class, 'id_pegawai', 'id_pegawai');
    }

    // Relasi ke KNP Pegawai
    public function knpPegawai()
    {
        return $this->hasMany(KnpPegawai::class, 'id_pegawai', 'id_pegawai');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'id_pegawai');
    }

    public function cutiHistories()
    {
        return $this->hasMany(CutiHistory::class, 'id_pegawai');
    }

    public function sisaCutiTahunIni()
    {
        $tahun = date('Y');
        return $this->cutiHistories()->where('tahun', $tahun)->first();
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'nip', 'nip');
    }
}
