<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CutiPegawai extends Model
{
    protected $table = 'cuti_pegawai';
    protected $primaryKey = 'id_cutipegawai';
    protected $fillable = [
        'id_pegawai',
        'jenis_cuti',
        'alasan_cuti',
        'alamat',
        'lama_cuti',
        'dari_tanggal',
        'sampai_dengan',
        'panmud_kasubag',
        'panitera_sekretaris',
        'ketua',
        'app_panmud_kasubag',
        'app_panitera_sekretaris',
        'app_ketua',
        'status_cuti',
        'ket_status_cuti'
    ];
    protected $casts = [
        'lama_cuti' => 'integer',
    ];

    // Relasi ke Pegawai
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id_pegawai');
    }
    public function notifications()
    {
        return $this->hasMany(Notification::class, 'id_cutipegawai', 'id_cutipegawai');
    }
}
