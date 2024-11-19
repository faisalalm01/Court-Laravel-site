<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KgbPegawai extends Model
{
    protected $table = 'kgb_pegawai';
    protected $fillable = [
        'id_pegawai',
        'kgb_terakhir',
        'kgb_datang',
        'keterangan',
        'timestamp'
    ];

    // Relasi ke Pegawai
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id_pegawai');
    }
}
