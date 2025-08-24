<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';
    protected $primaryKey = 'id_notification';
    protected $fillable = [
        'id_pegawai',
        'id_user',
        'id_cutipegawai',
        'pesan',
        'tipe',
        'dibaca',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id_pegawai');
    }
    public function cutiPegawai()
    {
        return $this->belongsTo(CutiPegawai::class, 'id_cutipegawai', 'id_cutipegawai');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
