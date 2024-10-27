<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KnpPegawai extends Model
{
    protected $table = 'knp_pegawai';
    protected $fillable = [
        'id_pegawai', 'knp_terakhir', 'knp_datang', 'keterangan', 'pensiun', 'timestamp'
    ];

    // Relasi ke Pegawai
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }
}
