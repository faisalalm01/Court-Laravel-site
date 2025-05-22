@extends('dashboard.index')

@section('content')
    <!-- <div class="page-title">
        <div class="title_left">
            <h3>KNP</h3>
        </div>

        <div class="title_right">
            <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">KNP</a></li>
                </ol>
            </div>
        </div>
    </div> -->

    <!-- <div class="">
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
                    <table id="data-tables" class="min-w-full table-auto border-collapse border border-gray-200">
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

    </div> -->
<div class="p-3">
    <div class="flex justify-between items-center">
        <div class="title_left">
            <h3 class="text-2xl font-semibold">KNP</h3>
        </div>
        <div class="title_right">
            <nav aria-label="breadcrumb">
                <ol class="flex space-x-2 text-gray-600">
                    <li><a href="#" class="hover:underline">Home</a> /</li>
                    <li class="text-gray-800 font-medium">KNP</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="p-3">
    <div class="bg-white shadow rounded-lg p-4">
        <div class="flex justify-between items-center mb-4">
            <div>
                <h2 class="text-xl font-bold">Daftar KNP</h2>
                <p class="text-sm text-gray-500">Kenaikan Pangkat Pegawai Pengadilan Negeri Purwokerto</p>
            </div>
            <div class="flex gap-2">
                <a href="export_cuti.php" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded flex items-center">
                    <i class="fa fa-download mr-2"></i> Export Excel
                </a>
                <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded flex items-center" data-toggle="modal" data-target=".btn-tambah-kgb">
                    <i class="fa fa-plus-circle mr-2"></i> Tambah KNP
                </a>
            </div>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
                <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
                <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="overflow-x-auto">
            <table id="data-tables" class="min-w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-gray-700 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">No</th>
                        <th class="py-3 px-6 text-left">Nama</th>
                        <th class="py-3 px-6 text-left">Jabatan</th>
                        <th class="py-3 px-6 text-left">Golongan</th>
                        <th class="py-3 px-6 text-left">KNP terakhir</th>
                        <th class="py-3 px-6 text-left">KNP yang akan datang</th>
                        <th class="py-3 px-6 text-left">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                        <tr class="hover:bg-gray-50 border-b border-gray-200">
                            <td class="py-4 px-6">{{ $loop->iteration }}</td>
                            <td class="py-4 px-6">{{ $d->pegawai->nama_pegawai }}</td>
                            <td class="py-4 px-6">{{ $d->pegawai->jabatan->nama_jabatan }}</td>
                            <td class="py-4 px-6">{{ $d->pegawai->golongan->nama_golongan }}</td>
                            <td class="py-4 px-6">{{ $d->knp_terakhir }}</td>
                            <td class="py-4 px-6">{{ $d->knp_datang }}</td>
                            <td class="py-4 px-6">{{ $d->keterangan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah KNP -->
<div class="modal fade btn-tambah-kgb hidden" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kenaikan Pangkat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form content would go here -->
                <p>Form tambah KNP akan ditampilkan di sini</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded" data-dismiss="modal">Tutup</button>
                <button type="button" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </div>
    </div>
</div>
@endsection
