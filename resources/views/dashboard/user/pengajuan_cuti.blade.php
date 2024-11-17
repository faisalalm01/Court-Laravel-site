@extends('dashboard.index')

@section('content')
    
<div role="main">
    <div class="px-3">
        <dis class="p-3">
            <div class="d-flex justify-content-between align-items-center">
                <!-- Title Kiri -->
                <div class="title_left">
                    <h3>Ajukan Cuti</h3>
                </div>
        
                <!-- Breadcrumb Kanan -->
                <div class="title_right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb float-sm-right m-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Ajukan Cuti</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </dis>
        

      <div class="clearfix"></div>

      <div class="row">
      <div class="col-md-3 col-sm-3"></div>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Form Pengajuan Cuti</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form method="POST">
                  <div class="form-group">
                      <label>Jenis cuti yang diambil</label>
                      <select class="form-control" name="jenis_cuti">
                          <option disabled selected>-- Pilih jenis cuti --</option>
                          <option value="Cuti Tahunan">Cuti Tahunan</option>
                          <option value="Cuti Besar">Cuti Besar</option>
                          <option value="Cuti Sakit">Cuti Sakit</option>
                          <option value="Cuti Melahirkan">Cuti Melahirkan</option>
                          <option value="Cuti Karena Alasan Penting">Cuti Karena Alasan Penting</option>
                          <option value="Cuti diluar Tanggungan Negara">Cuti diluar Tanggungan Negara</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="">Alasan Cuti</label>
                      <input type="text" required class="form-control" placeholder="Masukkan alasan cuti" name="alasan_cuti">
                  </div>
                  <div class="form-group">
                      <label for="">Lamanya cuti</label>
                      <input type="text" required class="form-control" placeholder="Masukan berapa lama" name="lama_cuti">
                      <select name="ket_lamacuti" class="form-control select2">
                          <option disabled selected>-- Pilih Hari, Bulan, Tahun --</option>
                          <option value="Hari">Hari</option>
                          <option value="Minggu">Minggu</option>
                          <option value="Bulan">Bulan</option>
                          <option value="Tahun">Tahun</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="">Dari tanggal</label>
                      <input type="date" required class="form-control" name="dari_tanggal">
                  </div>
                  <div class="form-group">
                      <label for="">Sampai dengan</label>
                      <input type="date" required class="form-control" name="sampai_dengan">
                  </div>
                  <div class="form-group">
                      <label for="">Atasan</label>
                      <select class="form-control" name="atasan">
                        <?php
                        //   include '../database/koneksi.php';

                        //   $queryjabatan = mysqli_query($koneksi, "SELECT * FROM pegawai pg, jabatan jb WHERE nip='$nip' and pg.id_jabatan=jb.id_jabatan");
                        //   $rowjabatan = mysqli_fetch_array($queryjabatan);
                        //   $jabatan = $rowjabatan['nama_jabatan'];

                        //   if ($jabatan == 'JURU SITA' || $jabatan =='JURU SITA PENGGANTI' || $jabatan == 'PANITERA PENGGANTI' || $jabatan == 'PANMUD HUKUM' || $jabatan == 'PANMUD GUGATAN' || $jabatan == 'PANMUD HUKUM' ) {
                        //     ?>
                        //     <option value="panitera">PANITERA</option>
                        //     <?php
                        //   } elseif ($jabatan == 'KASUBAG KEPEGAWAIAN DAN ORTALA' || $jabatan == 'KASUBAG PERNCANAAN, IT DAN PELAPORAN' || $jabatan == 'KASUBAG UMUM DAN KEUANGAN') {
                        //     ?>
                        //     <option value="sekretaris">SEKRETARIS</option>
                        //     <?php
                        //   } elseif ($jabatan == 'PANITERA' || $jabatan == 'SEKRETARIS' || $jabatan == 'HAKIM UTAMA MUDA' || $jabatan=='HAKIM MADYA UTAMA' || $jabatan =='WAKIL KETUA') {
                        //     ?>
                        //     <option value="ketua">KETUA</option>
                        //     <?php
                        //   } elseif ($jabatan == 'STAFF PELAKSANA PANMUD HUKUM') {
                        //     ?>
                        //     <option value="panmudhukum">PANMUD HUKUM</option>
                        //     <?php
                        //   } elseif ($jabatan == 'STAFF PELAKSANA PANMUD GUGATAN') {
                        //     ?>
                        //     <option value="panmudgugatan">PANMUD GUGATAN</option>
                        //     <?php
                        //   } elseif ($jabatan == 'STAFF PELAKSANA PANMUD PERMOHONAN') {
                        //     ?>
                        //     <option value="panmudpermohonan">PANMUD PERMOHONAN</option>
                        //     <?php
                        //   } elseif ($jabatan == 'STAFF PELAKSANA KEPEGAWAIAN DAN ORTALA') {
                        //     ?>
                        //     <option value="kasubagortala">KASUBAG KEPEGAWAIAN DAN ORTALA</option>
                        //     <?php
                        //   } elseif ($jabatan == 'STAFF PELAKSANA PERNCANAAN, IT DAN PELAPORAN') {
                        //     ?>
                        //     <option value="kasubagit">KASUBAG PERNCANAAN, IT DAN PELAPORAN</option>
                        //     <?php
                        //   } elseif ($jabatan == 'STAFF PELAKSANA PRAKOM') {
                        //     ?>
                        //     <option value="sekretaris">SEKRETARIS</option>
                        //     <?php
                        //   } elseif ($jabatan == 'STAFF PELAKSANA UMUM DAN KEUANGAN') {
                        //     ?>
                        //     <option value="kasubagkeuangan">KASUBAG UMUM DAN KEUANGAN</option>
                        //     <?php
                        //   } elseif ($jabatan == 'KETUA') {
                        //     ?>
                        //     <option value="ketualangsung">-</option>
                        //     <?php
                        //   }
                         ?>
                      </select>
                  </div>
                  <hr>
                  <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-primary">Ajukan Cuti</button>
                  </div>
                </form>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-3"></div>
      </div>
    </div>
  </div>

@endsection