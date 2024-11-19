@extends('dashboard.index')

@section('content')
    <div class="row">
        <div class="ccol-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content text-center">
                    <div class="flex">
                        <ul class="list-inline widget_profile_box">
                            <li>
                                <a>
                                    <i class="fa fa-lock"></i>
                                </a>
                            </li>
                            <li>
                                {{-- <?php
                include '../database/koneksi.php';

                $selectfoto = mysqli_query($koneksi, "SELECT * FROM user WHERE nip='$nip'");
                $row2 = mysqli_fetch_array($selectfoto);
                if (empty($row2['foto'])) {
                ?>
                    <img src="https://st.depositphotos.com/1537427/3571/v/450/depositphotos_35717211-stock-illustration-vector-user-icon.jpg" class="img-circle profile_img" alt="img-profile">
                <?php
              } elseif (!empty($row2['foto'])) {
                ?>
                    <img src="../build/images/thump_<?php echo $row2['foto']; ?>" class="img-circle profile_img">
                <?php
                }
                 ?> --}}
                            </li>
                            <li>
                                <a>
                                    <i class="fa fa-lock"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="flex">
                        <ul class="list-inline count2">
                            <li>
                                <h3 class="name">Selamat Datang</h3>

                                <h3 class="name">
                                    Nama Pegawai:
                                    {{ Auth::user()->pegawai->nama_pegawai }}
                                </h3>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row top_tiles">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Daftar Pengajuan Cuti Anda<small>Daftar Menunggu approval cuti dari atasan</small></h2>
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
                    <table id="datatable" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jenis Cuti</th>
                                <th>Alasan Cuti</th>
                                <th>Lama Cuti</th>
                                <th>Dari Tanggal</th>
                                <th>Sampai Dengan</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>



                        <tbody>

                            @forelse ($data as $d)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $d->pegawai->nama_pegawai }}</td>
                                    <td>{{ $d->jenis_cuti }}</td>
                                    <td>{{ $d->alasan_cuti }}</td>
                                    <td>{{ $d->lama_cuti }} {{ $d->ket_lama_cuti }}</td>
                                    <td>{{ $d->dari_tanggal }}</td>
                                    <td>{{ $d->sampai_dengan }}</td>

                                    <td class="text-center">
                                        <a href="#" class="btn btn-success btn-xs "> {{ $d->status_cuti }}</a>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-primary btn-xs ">
                                            {{ $d->ket_status_cuti }}</a>
                                    </td>
                                </tr>
                            @empty
                                <p>Data Kosong</p>
                            @endforelse




                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="ccol-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content text-center">
                    <h1><i class="fa fa-university"></i> </h1>
                    <p>Data Pegawai Pengadilan Negeri Purwokerto</p>
                    <p></p>
                    <p>©<?= date('Y') ?> Pengadilan Negeri Purwokerto.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
