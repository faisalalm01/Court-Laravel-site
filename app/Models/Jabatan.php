<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $primaryKey = 'id_jabatan';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $table = 'jabatan';
    protected $fillable = ['nama_jabatan'];

    // Relasi ke Pegawai
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'id_jabatan', 'id_jabatan');
    }
}
