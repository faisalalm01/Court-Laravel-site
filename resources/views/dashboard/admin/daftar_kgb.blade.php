@extends('dashboard.index')

@section('content')
    <!-- <div class="page-title">
        <div class="title_left">
            <h3>KGB</h3>
        </div>

        <div class="title_right">
            <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">KGB</a></li>
                </ol>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <a href="export_kgb.php" class="btn btn-success pull-right"><i class="fa fa-download"></i> Export Excel</a>
            <a href="#" class="btn btn-info pull-right" data-toggle="modal" data-target=".btn-tambah-kgb"><i
                    class="fa fa-plus-circle"></i> Tambah KGB</a>
            <div class="x_panel">
                <div class="x_title">
                    <h2>Daftar KGB <small>Kenaikan Gaji Berkala Pengadilan Negeri Purwokerto</small></h2>
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
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Jabatan</th>
                                <th>Golongan</th>
                                <th>KGB terakhir</th>
                                <th>KGB yang akan datang</th>
                                <th>Keterangan</th>
                                <th>Penetapan</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $d->pegawai->nama_pegawai }}</td>
                                    <td>{{ $d->pegawai->nip }}</td>
                                    <td>{{ $d->pegawai->jabatan->nama_jabatan }}</td>
                                    <td>{{ $d->pegawai->golongan->nama_golongan }}</td>
                                    <td>{{ $d->kgb_terakhir }} </td>
                                    <td>{{ $d->kgb_datang }}</td>
                                    <td>{{ $d->keterangan }}</td>
                                    <td><?php echo $d->timestamp; ?></td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-info" data-toggle="modal"
                                            data-target="#modalviewkgb<?php echo $d->id_kgbpegawai; ?>"><i class="fa fa-eye"></i>
                                            View</a>
                                        <a href="#" class="btn btn-primary" data-toggle="modal"
                                            data-target="#modaleditkgb<?php echo $d->id_kgbpegawai; ?>"><i class="fa fa-edit"></i>
                                            Edit</a>
                                        <a href="#" class="btn btn-danger" data-toggle="modal"
                                            data-target="#modaldeletekgb<?php echo $d->id_kgbpegawai; ?>"><i class="fa fa-trash"></i>
                                            Delete</a>
                                    </td>
                                </tr>

                                <div class="modal fade" id="modaldeletekgb<?php echo $d->id_kgbpegawai; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Hapus KGB Pegawai <?php echo $d->pegawai->nama_pegawai; ?></h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="" action="delete_kgb.php" method="get">
                                                    <div class="form-group">
                                                        <label>Anda ingin menghapus KGB <?php echo $d->pegawai->nama_pegawai; ?></label>
                                                        <input type="hidden" name="id_kgb" class="form-control"
                                                            value="<?php echo $d->id_kgbpegawai; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary">Yes</button>
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal"s>No</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal fade" id="modaleditkgb<?php echo $d->id_kgbpegawai; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Form Edit KNP</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="" action="edit_kgb.php" method="get">
                                                    <div class="form-group">
                                                        <label>Pegawai</label>
                                                        <select class="form-control" name="pegawai">
                                                            <option value="<?php echo $d->pegawai->nip; ?>"> <?php echo $d->pegawai->nama_pegawai; ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>KNP terakhir</label>
                                                        <input type="hidden" name="id_kgb"
                                                            value="<?php echo $d->id_kgbpegawai; ?>">
                                                        <input type="date" name="kgb_terakhir" class="form-control"
                                                            value="<?php echo $d->kgb_terakhir; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>KNP yang akan datang</label>
                                                        <input type="date" name="kgb_datang" class="form-control"
                                                            value="<?php echo $d->kgb_datang; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Keterangan</label>
                                                        <input type="text" class="form-control" name="keterangan"
                                                            value="<?php echo $d->keterangan; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="modalviewkgb<?php echo $d->id_kgbpegawai; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">View KNP Pegawai <?php echo $d->nama_pegawai; ?></h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <strong>Nama lengkap</strong>
                                                <p class="text-muted"><?php echo $d->pegawai->nama_pegawai; ?></p>
                                                <hr>
                                                <strong>NIP</strong>
                                                <p class="text-muted"><?php echo $d->pegawai->nip; ?></p>
                                                <hr>
                                                <strong>Jabatan</strong>
                                                <p class="text-muted"><?php echo $d->pegawai->jabatan->nama_jabatan; ?></p>
                                                <hr>
                                                <strong>Golongan</strong>
                                                <p class="text-muted"><?php echo $d->pegawai->golongan->nama_golongan; ?></p>
                                                <hr>
                                                <strong>KGB terakhir</strong>
                                                <p class="text-muted"><?php echo $d->kgb_terakhir; ?></p>
                                                <hr>
                                                <strong>KGB yang akan datang</strong>
                                                <p class="text-muted"><?php echo $d->kgb_datang; ?></p>
                                                <hr>
                                                <strong>Keterangan</strong>
                                                <p class="text-muted"><?php echo $d->keterangan; ?></p>
                                                <hr>
                                                <strong>Diubah pada</strong>
                                                <p class="text-muted"><?php echo $d->timestamp; ?></p>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="modal fade btn-tambah-kgb" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span
                                            aria-hidden="true">×</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">Form Tambah KGB </h4>
                                </div>
                                <div class="modal-body">
                                    <form data-parsley-validate class="form-horizontal form-label-left" method="POST">

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Pegawai</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select class="form-control" name="pegawai">
                                                    <option selected disabled>-- Pilih Pegawai--</option>
                                                    @foreach ($pegawai as $pegawai)
                                                        <option value="{{ $pegawai->id_pegawai }}">
                                                            {{ $pegawai->nama_pegawai }} |
                                                            {{ $pegawai->nip }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">KGB Terakhir</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-7 col-xs-12" type="date"
                                                    name="kgb_terakhir" value="">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">KGB yang akan datang
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-7 col-xs-12" type="date"
                                                    name="kgb_datang" value="">
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
            <h3 class="text-2xl font-semibold">KGB</h3>
        </div>
        <div class="title_right">
            <nav aria-label="breadcrumb">
                <ol class="flex space-x-2 text-gray-600">
                    <li><a href="#" class="hover:underline">Home</a> /</li>
                    <li class="text-gray-800 font-medium">KGB</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="p-3">
    <div class="bg-white shadow rounded-lg p-4">
        <div class="flex justify-between items-center mb-4">
            <div>
                <h2 class="text-xl font-bold">KGB</h2>
                <p class="text-sm text-gray-500">Kenaikan Gaji Berkala Pengadilan Negeri Purwokerto</p>
            </div>
            <div class="flex space-x-2">
                <a href="export_kgb.php" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded flex items-center">
                    <i class="fa fa-download mr-2"></i> Export Excel
                </a>
                <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded flex items-center" data-toggle="modal" data-target=".btn-tambah-kgb">
                    <i class="fa fa-plus-circle mr-2"></i> Tambah KGB
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
                        <th class="py-3 px-6 text-left">NIP</th>
                        <th class="py-3 px-6 text-left">Jabatan</th>
                        <th class="py-3 px-6 text-left">Golongan</th>
                        <th class="py-3 px-6 text-left">KGB terakhir</th>
                        <th class="py-3 px-6 text-left">KGB yang akan datang</th>
                        <th class="py-3 px-6 text-left">Keterangan</th>
                        <th class="py-3 px-6 text-left">Penetapan</th>
                        <th class="py-3 px-6 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                        <tr class="hover:bg-gray-50 border-b border-gray-200">
                            <td class="py-4 px-6">{{ $loop->iteration }}</td>
                            <td class="py-4 px-6">{{ $d->pegawai->nama_pegawai }}</td>
                            <td class="py-4 px-6">{{ $d->pegawai->nip }}</td>
                            <td class="py-4 px-6">{{ $d->pegawai->jabatan->nama_jabatan }}</td>
                            <td class="py-4 px-6">{{ $d->pegawai->golongan->nama_golongan }}</td>
                            <td class="py-4 px-6">{{ $d->kgb_terakhir }}</td>
                            <td class="py-4 px-6">{{ $d->kgb_datang }}</td>
                            <td class="py-4 px-6">{{ $d->keterangan }}</td>
                            <td class="py-4 px-6">{{ $d->penetapan ?? '-' }}</td>
                            <td class="py-4 px-6 text-center space-x-1">
                                <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded inline-flex items-center" data-toggle="modal" data-modal-toggle="modalviewkgb{{ $d->nip }}">
                                    <i class="fa fa-eye mr-1"></i> View
                                </a>
                                <a href="#" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded inline-flex items-center" data-toggle="modal" data-modal-toggle="modaleditkgb{{ $d->nip }}">
                                    <i class="fa fa-edit mr-1"></i> Edit
                                </a>
                                <a href="#" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded inline-flex items-center" data-toggle="modal" data-modal-toggle="modaldeletekgb{{ $d->nip }}">
                                    <i class="fa fa-trash mr-1"></i> Delete
                                </a>
                            </td>
                        </tr>

                        <!-- View Modal -->
                        <div id="modalviewkgb{{ $d->nip }}" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50">
                            <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl">
                                <div class="p-6">
                                    <h3 class="text-xl font-bold mb-4">Detail KGB - {{ $d->pegawai->nama_pegawai }}</h3>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <p class="font-medium">Nama Lengkap:</p>
                                            <p>{{ $d->pegawai->nama_pegawai }}</p>
                                        </div>
                                        <div>
                                            <p class="font-medium">NIP:</p>
                                            <p>{{ $d->pegawai->nip }}</p>
                                        </div>
                                        <div>
                                            <p class="font-medium">Jabatan:</p>
                                            <p>{{ $d->pegawai->jabatan->nama_jabatan }}</p>
                                        </div>
                                        <div>
                                            <p class="font-medium">Golongan:</p>
                                            <p>{{ $d->pegawai->golongan->nama_golongan }}</p>
                                        </div>
                                        <div>
                                            <p class="font-medium">KGB Terakhir:</p>
                                            <p>{{ $d->kgb_terakhir }}</p>
                                        </div>
                                        <div>
                                            <p class="font-medium">KGB Yang Akan Datang:</p>
                                            <p>{{ $d->kgb_datang }}</p>
                                        </div>
                                        <div class="col-span-2">
                                            <p class="font-medium">Keterangan:</p>
                                            <p>{{ $d->keterangan }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-6 py-3 flex justify-end">
                                    <button type="button" data-modal-hide="modalviewkgb{{ $d->nip }}" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-lg">
                                        Tutup
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Edit Modal -->
                        <div id="modaleditkgb{{ $d->nip }}" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50">
                            <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl">
                                <div class="p-6">
                                    <h3 class="text-xl font-bold mb-4">Edit KGB - {{ $d->pegawai->nama_pegawai }}</h3>
                                    <form>
                                        <!-- Form fields would go here -->
                                        <div class="grid grid-cols-2 gap-4">
                                            <div class="mb-4">
                                                <label class="block text-gray-700 mb-2">KGB Terakhir</label>
                                                <input type="date" class="w-full px-3 py-2 border rounded" value="{{ $d->kgb_terakhir }}">
                                            </div>
                                            <div class="mb-4">
                                                <label class="block text-gray-700 mb-2">KGB Yang Akan Datang</label>
                                                <input type="date" class="w-full px-3 py-2 border rounded" value="{{ $d->kgb_datang }}">
                                            </div>
                                            <div class="col-span-2 mb-4">
                                                <label class="block text-gray-700 mb-2">Keterangan</label>
                                                <textarea class="w-full px-3 py-2 border rounded">{{ $d->keterangan }}</textarea>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="bg-gray-50 px-6 py-3 flex justify-end space-x-2">
                                    <button type="button" data-modal-hide="modaleditkgb{{ $d->nip }}" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-lg">
                                        Batal
                                    </button>
                                    <button type="button" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Delete Modal -->
                        <div id="modaldeletekgb{{ $d->nip }}" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50">
                            <div class="bg-white rounded-lg shadow-xl w-full max-w-md">
                                <div class="p-6">
                                    <h3 class="text-xl font-bold mb-4">Hapus Data KGB</h3>
                                    <p>Apakah Anda yakin ingin menghapus data KGB untuk {{ $d->pegawai->nama_pegawai }}?</p>
                                </div>
                                <div class="bg-gray-50 px-6 py-3 flex justify-end space-x-2">
                                    <button type="button" data-modal-hide="modaldeletekgb{{ $d->nip }}" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-lg">
                                        Batal
                                    </button>
                                    <button type="button" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg">
                                        Hapus
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Tambah KGB Modal -->
<div class="modal hidden fade btn-tambah-kgb" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="text-xl font-bold">Tambah Kenaikan Gaji Berkala</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Pegawai</label>
                            <select class="w-full px-3 py-2 border rounded">
                                <option>Pilih Pegawai</option>
                                <!-- Options would be populated here -->
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">KGB Terakhir</label>
                            <input type="date" class="w-full px-3 py-2 border rounded">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">KGB Yang Akan Datang</label>
                            <input type="date" class="w-full px-3 py-2 border rounded">
                        </div>
                        <div class="col-span-2 mb-4">
                            <label class="block text-gray-700 mb-2">Keterangan</label>
                            <textarea class="w-full px-3 py-2 border rounded"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-gray-50 px-6 py-3 flex justify-end space-x-2">
                <button type="button" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-lg" data-dismiss="modal">
                    Batal
                </button>
                <button type="button" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg">
                    Simpan
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
