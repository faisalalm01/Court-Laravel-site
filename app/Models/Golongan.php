<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    protected $table = 'golongan';
    protected $fillable = ['nama_golongan'];

    // Relasi ke Pegawai
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'id_golongan', 'id_golongan');
    }
}
