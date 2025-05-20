<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        td {
            border: 1px solid black;
            padding: 4px;
            vertical-align: top;
        }

        .no-border td {
            border: none;
        }

        .center {
            text-align: center;
        }

        .right {
            text-align: right;
        }

        .bold {
            font-weight: bold;
        }

        .underline {
            text-decoration: underline;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>

    <p>Purwokerto, {{ \Carbon\Carbon::parse('2025-05-20')->translatedFormat('d F Y') }}</p>
    <p>Kepada<br>Yth. Ketua Pengadilan Negeri Purwokerto<br>Di Makele</p>

    <p class="center bold underline">PERMINTAAN DAN PEMBERIAN CUTI</p>
    <p class="center">Nomor: 0000/ /00000.20 May 2025</p>

    <table>
        <tr>
            <td>I.</td>
            <td colspan="14">DATA PEGAWAI</td>
        </tr>
        <tr>
            <td colspan="2">Nama</td>
            <td colspan="5"><strong>{{ $nama }}</strong></td>
            <td colspan="3">NIP</td>
            <td colspan="5"><strong>{{ $nip }}</strong></td>
        </tr>
        <tr>
            <td colspan="2">Jabatan</td>
            <td colspan="5">{{ $jabatan }}</td>
            <td colspan="3">Masa Kerja</td>
            <td colspan="5">-</td>
        </tr>
        <tr>
            <td colspan="2">Unit Kerja</td>
            <td colspan="13">{{ $unit_kerja }}</td>
        </tr>
        <tr>
            <td>II.</td>
            <td colspan="14">JENIS CUTI YANG DIAMBIL</td>
        </tr>
        <tr>
            <td>1.</td>
            <td colspan="3">Cuti Tahunan</td>
            <td colspan="3" class="center">{{ $jenis_cuti == 'Cuti Tahunan' ? '✓' : '' }}</td>
            <td colspan="2">2.</td>
            <td colspan="5">Cuti Besar</td>
        </tr>
        <tr>
            <td>3.</td>
            <td colspan="3">Cuti Sakit</td>
            <td colspan="3"></td>
            <td colspan="2">4.</td>
            <td colspan="5">Cuti Melahirkan</td>
        </tr>
        <tr>
            <td>5.</td>
            <td colspan="3">Cuti Karena Alasan Penting</td>
            <td colspan="3"></td>
            <td colspan="2">6.</td>
            <td colspan="5">Cuti di Luar Tanggungan Negara</td>
        </tr>
        <tr>
            <td>III.</td>
            <td colspan="14">ALASAN CUTI</td>
        </tr>
        <tr>
            <td colspan="15">{{ $alasan_cuti }}</td>
        </tr>
        <tr>
            <td>IV.</td>
            <td colspan="14">LAMANYA CUTI</td>
        </tr>
        <tr>
            <td colspan="4">Selama</td>
            <td colspan="4">Hari/Bulan/Tahun *</td>
            <td colspan="5" class="center">Mulai Tanggal</td>
            <td colspan="2" class="center">S/D</td>
        </tr>
        <tr>
            <td colspan="4">{{ $lama_cuti }}</td>
            <td colspan="4">Hari</td>
            <td colspan="5" class="center">{{ $tanggal_mulai }}</td>
            <td colspan="2" class="center">{{ $tanggal_selesai }}</td>
        </tr>
        <tr>
            <td>V.</td>
            <td colspan="14">CATATAN CUTI***</td>
        </tr>
        <tr>
            <td colspan="15">Keterangan (text)</td>
        </tr>
        <tr>
            <td>1.</td>
            <td colspan="7">CUTI TAHUNAN</td>
            <td colspan="4">2. CUTI BESAR</td>
            <td colspan="3"></td>
        </tr>
        <tr>
            <td>Tahun</td>
            <td colspan="3">Sisa</td>
            <td colspan="4">Keterangan</td>
            <td colspan="4">3. CUTI SAKIT</td>
            <td colspan="3"></td>
        </tr>
        <tr>
            <td>N.2</td>
            <td colspan="3">Varchar</td>
            <td colspan="4">Varchar</td>
            <td colspan="4">4. CUTI MELAHIRKAN</td>
            <td colspan="3"></td>
        </tr>
        <tr>
            <td>N.1</td>
            <td colspan="3">Varchar</td>
            <td colspan="4">Varchar</td>
            <td colspan="4">5. CUTI KARENA ALASAN PENTING</td>
            <td colspan="3"></td>
        </tr>
        <tr>
            <td>N</td>
            <td colspan="3">Varchar</td>
            <td colspan="4">Varchar</td>
            <td colspan="4">6. CUTI DI LUAR TANGGUNG NEGARA</td>
            <td colspan="3"></td>
        </tr>
        <tr>
            <td>VI.</td>
            <td colspan="14">ALAMAT SELAMA MENJALANKAN CUTI</td>
        </tr>
        <tr>
            <td colspan="11">{{ $alamat }}</td>
            <td colspan="4" class="center">
                Hormat saya<br><br>
                <strong>{{ $nama }}</strong><br>
                <strong>NIP: {{ $nip }}</strong>
            </td>
        </tr>
    </table>

    <div class="page-break"></div>

    <table>
        <tr>
            <td>VII.</td>
            <td colspan="14">PERTIMBANGAN ATASAN LANGSUNG **</td>
        </tr>
        <tr>
            <td colspan="4">DISETUJUI</td>
            <td>PERUBAHAN ****</td>
            <td colspan="6">DITANGGUHKAN ****</td>
            <td colspan="4">TIDAK DISETUJUI ****</td>
        </tr>
    </table>

    <p class="right">
        PANITERA<br><br><br>
        <strong><u>{{ $atasan }}</u></strong><br>
        <strong>NIP: {{ $nip_atasan }}</strong>
    </p>

    <br><br>

    <table>
        <tr>
            <td>VIII.</td>
            <td colspan="14">KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI **</td>
        </tr>
        <tr>
            <td colspan="3">DISETUJUI</td>
            <td colspan="2">PERUBAHAN ****</td>
            <td colspan="6">DITANGGUHKAN ****</td>
            <td colspan="4">TIDAK DISETUJUI</td>
        </tr>
    </table>

    <p class="right">
        KETUA<br><br><br>
        <strong><u>{{ $ketua }}</u></strong><br>
        <strong>NIP: {{ $nip_ketua }}</strong>
    </p>

</body>

</html>
