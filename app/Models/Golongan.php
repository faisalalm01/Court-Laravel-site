<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    protected $primaryKey = 'id_golongan';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $table = 'golongan';
    protected $fillable = ['nama_golongan'];

    // Relasi ke Pegawai
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'id_golongan', 'id_golongan');
    }
}
