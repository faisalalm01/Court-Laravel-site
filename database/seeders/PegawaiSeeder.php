<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        DB::table('pegawai')->insert([
            ['id_pegawai' => 58, 'nama_pegawai' => 'RUDY RUSWOYO, S.H, M.H', 'nip' => '197610182001121002', 'id_jabatan' => 1, 'id_golongan' => 2, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 59, 'nama_pegawai' => 'EDDY DAULATA SEMBIRING, S.H, M.H', 'nip' => '197905282002121001', 'id_jabatan' => 2, 'id_golongan' => 2, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 60, 'nama_pegawai' => 'VILIA SARI, S.H., M.Kn', 'nip' => '197701242001122002', 'id_jabatan' => 4, 'id_golongan' => 1, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 61, 'nama_pegawai' => 'VERONICA SEKAR WIDURI, S.H.', 'nip' => '197703312002122003', 'id_jabatan' => 3, 'id_golongan' => 1, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 62, 'nama_pegawai' => 'KOPSAH, S.H., M.H.', 'nip' => '197407172006042001', 'id_jabatan' => 3, 'id_golongan' => 1, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 63, 'nama_pegawai' => 'MELCKY JOHNY OTOH, S.H.', 'nip' => '198203192006041002', 'id_jabatan' => 4, 'id_golongan' => 1, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 64, 'nama_pegawai' => 'INDAH POKTA, S.H.,M.H.', 'nip' => '198509082009042003', 'id_jabatan' => 4, 'id_golongan' => 1, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 65, 'nama_pegawai' => 'RIANA KUSUMAWATI S.H.,M.H.', 'nip' => '198312102009042009', 'id_jabatan' => 4, 'id_golongan' => 1, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 66, 'nama_pegawai' => 'HARIYANTO, S.H, M.H', 'nip' => '196804101996031003', 'id_jabatan' => 5, 'id_golongan' => 1, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 67, 'nama_pegawai' => 'IMAM WIDIANTO, SH', 'nip' => '197110272001121001', 'id_jabatan' => 9, 'id_golongan' => 9, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 68, 'nama_pegawai' => 'NURUL BASTIL FUAD, S.H.', 'nip' => '197106161996031002', 'id_jabatan' => 7, 'id_golongan' => 9, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 69, 'nama_pegawai' => 'AGUS PURNOMO, SH', 'nip' => '197308131995031001', 'id_jabatan' => 8, 'id_golongan' => 9, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 70, 'nama_pegawai' => 'SAYEKTI SRI HARWANTI', 'nip' => '196609241986032001', 'id_jabatan' => 6, 'id_golongan' => 9, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 71, 'nama_pegawai' => 'PAUNG INDRA WARDANA, SE', 'nip' => '197609072006041006', 'id_jabatan' => 17, 'id_golongan' => 9, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 72, 'nama_pegawai' => 'ANNISA NUR ROZANI, S.E.', 'nip' => '198509182009042006', 'id_jabatan' => 16, 'id_golongan' => 9, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 73, 'nama_pegawai' => 'DIAH SOELISTIJAWATI, S.H.', 'nip' => '197004081994032003', 'id_jabatan' => 18, 'id_golongan' => 9, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 74, 'nama_pegawai' => 'DIAN RIVIA PAMUNGKAS, S.H.', 'nip' => '199109042019031004', 'id_jabatan' => 19, 'id_golongan' => 6, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 75, 'nama_pegawai' => 'ALFI PANGESTUTI, S.I.A', 'nip' => '199301302019032005', 'id_jabatan' => 19, 'id_golongan' => 12, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 76, 'nama_pegawai' => 'TRI PUJI ASTUTI, A.Md', 'nip' => '199302062020122007', 'id_jabatan' => 21, 'id_golongan' => 12, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 77, 'nama_pegawai' => 'ARIO WIDJAYANTO, S.E.', 'nip' => '199002282020121005', 'id_jabatan' => 21, 'id_golongan' => 6, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 78, 'nama_pegawai' => 'RIZKIAN JULIANTO, S.E.', 'nip' => '198807282022031003', 'id_jabatan' => 20, 'id_golongan' => 6, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 79, 'nama_pegawai' => 'CINDY ARIESTA PURBA, A.md.', 'nip' => '199904182022032008', 'id_jabatan' => 10, 'id_golongan' => 12, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 80, 'nama_pegawai' => 'HERAWATI NAIBAHO, A.md.', 'nip' => '199008162022032005', 'id_jabatan' => 11, 'id_golongan' => 12, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 81, 'nama_pegawai' => 'Elsa Sifra Sitinjak, AMd.Ab', 'nip' => '199910012022032007', 'id_jabatan' => 12, 'id_golongan' => 12, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 83, 'nama_pegawai' => 'PARYONO', 'nip' => '10', 'id_jabatan' => 11, 'id_golongan' => 11, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 84, 'nama_pegawai' => 'DWI RIA DINAWATI, S.H.', 'nip' => '20', 'id_jabatan' => 19, 'id_golongan' => 11, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 85, 'nama_pegawai' => 'HANI ABDUL ROUF', 'nip' => '30', 'id_jabatan' => 20, 'id_golongan' => 11, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 86, 'nama_pegawai' => 'AGUNG AJI WIJAYA', 'nip' => '40', 'id_jabatan' => 21, 'id_golongan' => 11, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 87, 'nama_pegawai' => 'TRI WAHYUDIONO', 'nip' => '50', 'id_jabatan' => 21, 'id_golongan' => 11, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 88, 'nama_pegawai' => 'WARNENGSIH, S.Sy.', 'nip' => '60', 'id_jabatan' => 12, 'id_golongan' => 11, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 89, 'nama_pegawai' => 'AGUNG NUGROHO', 'nip' => '70', 'id_jabatan' => 21, 'id_golongan' => 11, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 90, 'nama_pegawai' => 'RAHMA SEVIANA P., S.T.', 'nip' => '199009122020122010', 'id_jabatan' => 22, 'id_golongan' => 6, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 91, 'nama_pegawai' => 'Admin', 'nip' => '00', 'id_jabatan' => 22, 'id_golongan' => 11, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 92, 'nama_pegawai' => 'R. OEOEN WAHYOE N, SH', 'nip' => '197109031993031001', 'id_jabatan' => 14, 'id_golongan' => 9, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 93, 'nama_pegawai' => 'BOBY HERTANTO, S.H.', 'nip' => '198202052009121001', 'id_jabatan' => 14, 'id_golongan' => 9, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 94, 'nama_pegawai' => 'ARI YOHANA, S.E.', 'nip' => '197909142009041004', 'id_jabatan' => 14, 'id_golongan' => 9, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 95, 'nama_pegawai' => 'RUDI WAHYU WARDANA', 'nip' => '197006061992031003', 'id_jabatan' => 14, 'id_golongan' => 9, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 96, 'nama_pegawai' => 'DYAH IRMA SETYORINI, S.H.', 'nip' => '197507192008052001', 'id_jabatan' => 15, 'id_golongan' => 8, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 97, 'nama_pegawai' => 'NINIK TRIYANI', 'nip' => '197001021990032003', 'id_jabatan' => 15, 'id_golongan' => 7, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 98, 'nama_pegawai' => 'SADIANI', 'nip' => '197012201993032004', 'id_jabatan' => 13, 'id_golongan' => 7, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 99, 'nama_pegawai' => 'SARYUNI', 'nip' => '197211041993032001', 'id_jabatan' => 15, 'id_golongan' => 7, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
            ['id_pegawai' => 100, 'nama_pegawai' => 'ANNA SETYARINI', 'nip' => '197201291994032003', 'id_jabatan' => 15, 'id_golongan' => 7, 'unit_kerja' => 'PENGADILAN NEGERI PURWOKERTO', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
