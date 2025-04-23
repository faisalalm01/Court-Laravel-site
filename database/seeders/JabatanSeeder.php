<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        DB::table('jabatan')->insert([
            ['id_jabatan' => 1, 'nama_jabatan' => 'KETUA', 'created_at' => $now, 'updated_at' => $now],
            ['id_jabatan' => 2, 'nama_jabatan' => 'WAKIL KETUA', 'created_at' => $now, 'updated_at' => $now],
            ['id_jabatan' => 3, 'nama_jabatan' => 'HAKIM UTAMA MUDA', 'created_at' => $now, 'updated_at' => $now],
            ['id_jabatan' => 4, 'nama_jabatan' => 'HAKIM MADYA UTAMA', 'created_at' => $now, 'updated_at' => $now],
            ['id_jabatan' => 5, 'nama_jabatan' => 'PANITERA', 'created_at' => $now, 'updated_at' => $now],
            ['id_jabatan' => 6, 'nama_jabatan' => 'SEKRETARIS', 'created_at' => $now, 'updated_at' => $now],
            ['id_jabatan' => 7, 'nama_jabatan' => 'PANMUD HUKUM', 'created_at' => $now, 'updated_at' => $now],
            ['id_jabatan' => 8, 'nama_jabatan' => 'PANMUD  GUGATAN', 'created_at' => $now, 'updated_at' => $now],
            ['id_jabatan' => 9, 'nama_jabatan' => 'PANMUD PERMOHONAN', 'created_at' => $now, 'updated_at' => $now],
            ['id_jabatan' => 10, 'nama_jabatan' => 'STAFF PELAKSANA PANMUD HUKUM', 'created_at' => $now, 'updated_at' => $now],
            ['id_jabatan' => 11, 'nama_jabatan' => 'STAFF PELAKSANA PANMUD GUGATAN', 'created_at' => $now, 'updated_at' => $now],
            ['id_jabatan' => 12, 'nama_jabatan' => 'STAFF PELAKSANA PANMUD PERMOHONAN', 'created_at' => $now, 'updated_at' => $now],
            ['id_jabatan' => 13, 'nama_jabatan' => 'PANITERA PENGGANTI', 'created_at' => $now, 'updated_at' => $now],
            ['id_jabatan' => 14, 'nama_jabatan' => 'JURU SITA', 'created_at' => $now, 'updated_at' => $now],
            ['id_jabatan' => 15, 'nama_jabatan' => 'JURU SITA PENGGANTI', 'created_at' => $now, 'updated_at' => $now],
            ['id_jabatan' => 16, 'nama_jabatan' => 'KASUBAG KEPEGAWAIAN DAN ORTALA', 'created_at' => $now, 'updated_at' => $now],
            ['id_jabatan' => 17, 'nama_jabatan' => 'KASUBAG PERNCANAAN, IT DAN PELAPORAN', 'created_at' => $now, 'updated_at' => $now],
            ['id_jabatan' => 18, 'nama_jabatan' => 'KASUBAG UMUM DAN KEUANGAN', 'created_at' => $now, 'updated_at' => $now],
            ['id_jabatan' => 19, 'nama_jabatan' => 'STAFF PELAKSANA KEPEGAWAIAN DAN ORTALA', 'created_at' => $now, 'updated_at' => $now],
            ['id_jabatan' => 20, 'nama_jabatan' => 'STAFF PELAKSANA PERNCANAAN, IT DAN PELAPORAN', 'created_at' => $now, 'updated_at' => $now],
            ['id_jabatan' => 21, 'nama_jabatan' => 'STAFF PELAKSANA UMUM DAN KEUANGAN', 'created_at' => $now, 'updated_at' => $now],
            ['id_jabatan' => 22, 'nama_jabatan' => 'STAFF PELAKSANA PRAKOM', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
