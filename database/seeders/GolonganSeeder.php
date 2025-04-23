<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GolonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('golongan')->insert([
            ['id_golongan' => 1, 'nama_golongan' => 'IV A', 'created_at' => $now, 'updated_at' => $now],
            ['id_golongan' => 2, 'nama_golongan' => 'IV B', 'created_at' => $now, 'updated_at' => $now],
            ['id_golongan' => 3, 'nama_golongan' => 'IV C', 'created_at' => $now, 'updated_at' => $now],
            ['id_golongan' => 4, 'nama_golongan' => 'IV D', 'created_at' => $now, 'updated_at' => $now],
            ['id_golongan' => 5, 'nama_golongan' => 'IV E', 'created_at' => $now, 'updated_at' => $now],
            ['id_golongan' => 6, 'nama_golongan' => 'III A', 'created_at' => $now, 'updated_at' => $now],
            ['id_golongan' => 7, 'nama_golongan' => 'III B', 'created_at' => $now, 'updated_at' => $now],
            ['id_golongan' => 8, 'nama_golongan' => 'III C', 'created_at' => $now, 'updated_at' => $now],
            ['id_golongan' => 9, 'nama_golongan' => 'III D', 'created_at' => $now, 'updated_at' => $now],
            ['id_golongan' => 10, 'nama_golongan' => 'II A', 'created_at' => $now, 'updated_at' => $now],
            ['id_golongan' => 11, 'nama_golongan' => 'PPNPN', 'created_at' => $now, 'updated_at' => $now],
            ['id_golongan' => 12, 'nama_golongan' => 'II C', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
