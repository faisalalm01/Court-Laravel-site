@extends('dashboard.index')

@section('content')
    <div class="p-3">
        <div class="flex justify-between items-center">
            <div class="title_left">
                <h3 class="text-2xl font-semibold">Daftar Pegawai</h3>
            </div>
            <div class="title_right">
                <nav aria-label="breadcrumb">
                    <ol class="flex space-x-2 text-gray-600">
                        <li><a href="#" class="hover:underline">Home</a> /</li>
                        <li class="text-gray-800 font-medium">Pegawai</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="p-3">
        <div class="bg-white shadow rounded-lg p-4">
        <div class="flex justify-between items-center mb-4">
            <div>
                <h2 class="text-xl font-bold">Daftar Pegawai</h2>
                <p class="text-sm text-gray-500">Daftar pegawai pengadilan Negeri Purwokerto</p>
            </div>
            <div class="flex gap-2">
                <a href="#" data-toggle="modal" data-modal-toggle="modaltambahpegawai" class="bg-teal-500 hover:bg-teal-600 text-white px-4 py-2 rounded flex items-center" data-toggle="modal" data-target=".btn-tambah-kgb">
                    <i class="fa fa-plus-circle mr-2"></i> Tambah Pegawai
                </a>
                <a href="export_kgb.php" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded flex items-center">
                    <i class="fa fa-download mr-2"></i> Export Excel
                </a>
            </div>
        </div>

            <div class="overflow-x-auto">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <table id="data-tables" class="min-w-full table-auto border-collapse">
                    <thead>
                        <tr class="bg-gray-100 text-gray-700 uppercase text-sm leading-normal">
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama Pegawai</th>
                            <th>Jabatan</th>
                            <th>Golongan</th>
                            <th>Unit Kerja</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $pegawai)
                            <tr class="hover:bg-gray-50">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pegawai->nip }}</td>
                                <td>{{ $pegawai->nama_pegawai }}</td>
                                <td>{{ $pegawai->jabatan->nama_jabatan }}</td>
                                <td>{{ $pegawai->golongan->nama_golongan }}</td>
                                <td>{{ $pegawai->unit_kerja }}</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" data-toggle="modal"
                                        data-modal-toggle="modalviewpegawai{{ $pegawai->nip }}"><i class="fa fa-eye"></i>
                                        View</a>
                                    <a href="#" class="btn btn-info" data-toggle="modal"
                                        data-modal-toggle="modaleditpegawai{{ $pegawai->nip }}"><i class="fa fa-edit"></i>
                                        Edit</a>
                                    <a href="#" class="btn btn-info" data-toggle="modal"
                                        data-modal-toggle="modaldeletepegawai{{ $pegawai->nip }}"><i
                                            class="fa fa-trash"></i>
                                        delete</a>
                                </td>
                                <!-- <td class="text-center">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </td> -->
                            </tr>

                            <!-- Modal -->
                            <div id="modalviewpegawai{{ $pegawai->nip }}"
                                class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50">
                                <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl">
                                    <div class="p-6">
                                        <h3 class="text-xl font-bold mb-4">Detail Pegawai -
                                            {{ $pegawai->nama_pegawai }}
                                        </h3>
                                        <!-- Konten modal -->
                                        <div class="space-y-3">
                                            <p><strong>Nama Lengkap:</strong> {{ $pegawai->nama_pegawai }}</p>
                                            <p><strong>NIP:</strong> {{ $pegawai->nip }}</p>
                                            <p><strong>Jabatan:</strong> {{ $pegawai->jabatan->nama_jabatan }}</p>
                                            <p><strong>Golongan:</strong> {{ $pegawai->golongan->nama_golongan }}
                                            </p>
                                            <p><strong>Unit Kerja</strong> {{ $pegawai->unit_kerja }}</p>
                                            <!-- Data lainnya -->
                                        </div>
                                    </div>

                                    <div class="bg-gray-50 px-6 py-3 flex justify-end">
                                        <button type="button" data-modal-hide="modaleditpegawai{{ $pegawai->nip }}"
                                            class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-lg">
                                            Tutup
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- modal edit -->
                             <div id="modaleditpegawai{{ $pegawai->nip }}"
                                class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50">
                                <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl">
                                    <div class="p-6">
                                        modal edit
                                    </div>
                                    <div class="bg-gray-50 px-6 py-3 flex justify-end">
                                        <button type="button" data-modal-hide="modaleditpegawai{{ $pegawai->nip }}"
                                            class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-lg">
                                            Tutup
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- modal delete -->
                             <div id="modaldeletepegawai{{ $pegawai->nip }}"
                                class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50">
                                <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl">
                                    <div class="p-6">
                                        modal delete
                                    </div>
                                    <div class="bg-gray-50 px-6 py-3 flex justify-end">
                                        <button type="button" data-modal-hide="modaldeletepegawai{{ $pegawai->nip }}"
                                            class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-lg">
                                            batal
                                        </button>
                                    </div>
                                </div>
                            </div>

                            
                            <!-- modal tambah -->
                            <div id="modaltambahpegawai"
                                class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50">
                                <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl">
                                    <div class="px-6 py-3">
                                        <div class="">
                                            <fo action="{{ route('dashboard.admin.add-pegawai') }}" data-parsley-validate
                                                class="form-horizontal form-label-left" method="POST">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama
                                                        Pegawai</label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input class="form-control col-md-7 col-xs-12" type="text"
                                                            name="nama" placeholder="Nama Pegawai">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">NIP</label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input class="form-control col-md-7 col-xs-12" type="text"
                                                            name="nip" placeholder="NIP">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Jabatan</label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <select class="form-control" name="jabatan">
                                                            <option selected disabled>-- Pilih Jabatan--</option>
                                                            @foreach ($jabatan as $jab)
                                                                <option value="{{ $jab->id_jabatan }}">
                                                                    {{ $jab->nama_jabatan }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        class="control-label col-md-3 col-sm-3 col-xs-12">Golongan</label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <select class="form-control" name="golongan">
                                                            <option selected disabled>-- Pilih Golongan--</option>
                                                            @foreach ($golongan as $gol)
                                                                <option value="{{ $gol->id_golongan }}">
                                                                    {{ $gol->nama_golongan }}
                                                                </option>
                                                            @endforeach
                                                        </select>
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
                                        <button class="p-2 my-3 bg-gray-200 text-2xl rounded-md" type="button"
                                            data-modal-hide="modaltambahpegawai">
                                            <span aria-hidden="true">X</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
            </div>
            @endforeach
            </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
