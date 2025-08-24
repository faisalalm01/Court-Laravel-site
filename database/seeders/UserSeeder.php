<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        DB::table('user')->insert([
            ['id_user' => 57, 'nip' => '197610182001121002', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 58, 'nip' => '197905282002121001', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 59, 'nip' => '197701242001122002', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 60, 'nip' => '197703312002122003', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 61, 'nip' => '197407172006042001', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 62, 'nip' => '198203192006041002', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 63, 'nip' => '198509082009042003', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 64, 'nip' => '196804101996031003', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 65, 'nip' => '197110272001121001', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 66, 'nip' => '197106161996031002', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 67, 'nip' => '197308131995031001', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 68, 'nip' => '196609241986032001', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 69, 'nip' => '197609072006041006', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 70, 'nip' => '198509182009042006', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 71, 'nip' => '197004081994032003', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 72, 'nip' => '199109042019031004', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 73, 'nip' => '199301302019032005', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 74, 'nip' => '199302062020122007', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 75, 'nip' => '199002282020121005', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 76, 'nip' => '198807282022031003', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 77, 'nip' => '199904182022032008', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 78, 'nip' => '198312102009042009', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 79, 'nip' => '199008162022032005', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 80, 'nip' => '199910012022032007', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 81, 'nip' => '10', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 82, 'nip' => '20', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 83, 'nip' => '30', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 84, 'nip' => '40', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 85, 'nip' => '50', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 86, 'nip' => '60', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 87, 'nip' => '70', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 88, 'nip' => '199009122020122010', 'password' => 'b47b9c9ac24aeca33011eccd56f176aa', 'role' => 'Admin', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 89, 'nip' => '00', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'Admin', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 90, 'nip' => '197109031993031001', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 91, 'nip' => '198202052009121001', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 92, 'nip' => '197909142009041004', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 93, 'nip' => '197006061992031003', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 94, 'nip' => '197507192008052001', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 95, 'nip' => '197001021990032003', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 96, 'nip' => '197012201993032004', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 97, 'nip' => '197211041993032001', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
            ['id_user' => 98, 'nip' => '197201291994032003', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'User', 'foto' => null, 'created_at' => $now, 'updated_at' => $now, 'status' => 'active'],
        ]);
    }
}
