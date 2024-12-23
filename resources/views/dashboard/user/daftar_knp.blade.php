@extends('dashboard.index')

@section('content')
<div class="mb-10">
    <div class="justify-between">
            <!-- Title Kiri -->
            <div class="title_left">
                <h3 class="text-2xl">KGB</h3>
            </div>

            <!-- Breadcrumb Kanan -->
            <div class="title_right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb float-sm-right m-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">KGB</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="">
        <div class="">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Daftar KNP <small>Kenaikan Pangkat Pegawai Pengadilan Negeri Purwokerto</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="table-data" class="min-w-full table-auto border-collapse border border-gray-200">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Golongan</th>
                                <th>KNP terakhir</th>
                                <th>KNP yang akan datang</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $d->pegawai->nama_pegawai }}</td>
                                    <td>{{ $d->pegawai->jabatan->nama_jabatan }}</td>
                                    <td>{{ $d->pegawai->golongan->nama_golongan }}</td>
                                    <td>{{ $d->knp_terakhir }} </td>
                                    <td>{{ $d->knp_datang }}</td>
                                    <td>{{ $d->keterangan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="modal fade btn-tambah-knp" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span
                                            aria-hidden="true">×</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">Form Tambah KNP </h4>
                                </div>
                                <div class="modal-body">
                                    <form data-parsley-validate class="form-horizontal form-label-left" method="POST">

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Pegawai</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select class="form-control" name="pegawai">
                                                    <option selected disabled>-- Pilih Pegawai--</option>
                                                    {{-- <?php
                            include '../database/koneksi.php';
                            $query = mysqli_query($koneksi,"SELECT * FROM pegawai");
                            $i = 1;
                            while ($row = mysqli_fetch_array($query)) {
                           ?>
                           <option value="<?php echo $row['id_pegawai']; ?>"><?php echo $row['nama_pegawai']; ?> | <?php echo $row['nip']; ?></option>
                           <?php
                           $i++;
                         }
                            ?> --}}
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">KNP Terakhir</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-7 col-xs-12" type="date"
                                                    name="knp_terakhir" value="">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">KNP yang akan datang
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-7 col-xs-12" type="date"
                                                    name="knp_datang" value="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-7 col-xs-12" type="text"
                                                    name="keterangan" placeholder="Masukkan Keterangan">
                                            </div>
                                        </div>



                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button type="submit" class="btn btn-primary"
                                                    name="submit">Submit</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <?php
        include '../database/koneksi.php';
        
        if (isset($_POST['submit'])) {
            $id = $_POST['pegawai'];
            $knpterakhir = $_POST['knp_terakhir'];
            $knpdatang = $_POST['knp_datang'];
            $ket = $_POST['keterangan'];
        
            $query = mysqli_query($koneksi, "INSERT INTO knp_pegawai VALUES ('', '$id','$knpterakhir', '$knpdatang', '$ket')");
        
            if ($query) {
                echo "<script>alert('Data Berhasil Ditambahkan'); document.location='index.php?page=daftar_knp';</script>";
            } else {
                echo "<script>alert('Data Gagal Ditambahkan'); document.location='index.php?page=daftar_knp';</script>";
            }
        }
        ?> --}}
    </div>
@endsection
