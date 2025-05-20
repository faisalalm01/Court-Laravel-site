@extends('dashboard.index')

@section('content')
    <div class="p-3">
        <div class="flex justify-between items-center">
            <div class="title_left">
                <h3 class="text-2xl font-semibold">Daftar Users</h3>
            </div>
            <div class="title_right">
                <nav aria-label="breadcrumb">
                    <ol class="flex space-x-2 text-gray-600">
                        <li><a href="#" class="hover:underline">Home</a> /</li>
                        <li class="text-gray-800 font-medium">Users</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="p-3">
        <div class="bg-white shadow rounded-lg p-4">
            <div class="mb-4">
                <h2 class="text-xl font-bold">Daftar User</h2>
                <p class="text-sm text-gray-500">User yang menggunakan aplikasi</p>
            </div>

            <div class="overflow-x-auto">
                <button href="#" title="Tambah User" type="button" class="btn btn-info pull-right"
                    data-toggle="modal" data-modal-toggle="modaltambahuser"><i class="fa fa-plus-circle"></i> Tambah
                    User</button>
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
                            <th>Hak Akses</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $user)
                            <tr class="hover:bg-gray-50">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->nip }}</td>
                                <td>{{ $user->pegawai->nama_pegawai }}</td>
                                <td>{{ $user->pegawai->jabatan->nama_jabatan }}</td>
                                <td>{{ $user->role }}</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" data-toggle="modal"
                                        data-modal-toggle="modalviewuser{{ $user->nip }}"><i class="fa fa-eye"></i>
                                        View</a>
                                    <a href="#" class="btn btn-info" data-toggle="modal"
                                        data-modal-toggle="modaledituser{{ $user->nip }}"><i class="fa fa-edit"></i>
                                        Edit</a>
                                </td>
                                <!-- <td class="text-center">
                                                        </td> -->
                            </tr>

                            <!-- Modal -->
                            <div id="modalviewuser{{ $user->nip }}"
                                class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50">
                                <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl">
                                    <div class="p-6">
                                        <h3 class="text-xl font-bold mb-4">Detail User - {{ $user->pegawai->nama_pegawai }}
                                        </h3>
                                        <!-- Konten modal -->
                                        <div class="space-y-3">
                                            <p><strong>Nama Lengkap:</strong> {{ $user->pegawai->nama_pegawai }}</p>
                                            <p><strong>NIP:</strong> {{ $user->nip }}</p>
                                            <p><strong>Jabatan:</strong> {{ $user->pegawai->jabatan->nama_jabatan }}</p>
                                            <p><strong>Golongan:</strong> {{ $user->pegawai->golongan->nama_golongan }}</p>
                                            <p><strong>Hak Akses Akun:</strong> {{ $user->role }}</p>
                                            <!-- Data lainnya -->
                                        </div>
                                    </div>

                                    <div class="bg-gray-50 px-6 py-3 flex justify-end">
                                        <button type="button" data-modal-hide="modalviewuser{{ $user->nip }}"
                                            class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-lg">
                                            Tutup
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div id="modaltambahuser"
                                class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50">

                                <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl">
                                    <div class="px-6 py-3">
                                        <div class="">
                                            <fo action="{{ route('dashboard.admin.add-users') }}" data-parsley-validate
                                                class="form-horizontal form-label-left" method="POST">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Pegawai</label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <select class="form-control" name="nip">
                                                            <option selected disabled>-- Pilih Pegawai--</option>
                                                            @foreach ($pegawai as $peg)
                                                                <option value="{{ $peg->nip }}">
                                                                    {{ $peg->nama_pegawai }}
                                                                    |
                                                                    {{ $peg->nip }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input class="form-control col-md-7 col-xs-12" type="password"
                                                            name="password" placeholder="Masukkan Password">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Hak
                                                        Akses</label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <select class="form-control" name="role">
                                                            <option selected disabled>-- Pilih Hak Akses--</option>
                                                            <option value="User">User</option>
                                                            <option value="Admin">Admin</option>
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
                                            data-modal-hide="modaltambahuser">
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
