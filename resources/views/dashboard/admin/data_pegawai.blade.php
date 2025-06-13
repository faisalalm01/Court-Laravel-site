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
                    <div class="alert alert-success bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded relative mb-4" role="alert" id="alert-success">
                        {{ session('success') }}
                        <button type="button" class="absolute top-1 right-2 text-green-800 hover:text-green-900" data-dismiss="alert">
                            &times;
                        </button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger bg-red-100 border border-red-300 text-red-800 px-4 py-3 rounded relative mb-4" role="alert" id="alert-error">
                        {{ session('error') }}
                        <button type="button" class="absolute top-1 right-2 text-red-800 hover:text-red-900" data-dismiss="alert">
                            &times;
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

                            <!-- Modal view -->
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
                                        <button type="button" data-modal-hide="modalviewpegawai{{ $pegawai->nip }}"
                                            class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-lg">
                                            Tutup
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- modal edit -->
                             <div id="modaleditpegawai{{ $pegawai->nip }}" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50 p-4 {{ (session('error') || $errors->any()) ? 'flex' : 'hidden' }}">
                                <div class="w-full max-w-2xl rounded-lg bg-white shadow-xl">
                                    <div class="border-b p-4">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-xl font-semibold text-gray-800">Form Edit Pegawai</h3>
                                        <button type="button" class="text-gray-400 hover:text-gray-500" data-modal-hide="modaleditpegawai{{ $pegawai->nip }}">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        </button>
                                    </div>
                                    </div>
                                    <div class="p-6">
                                    <form action="{{ route('dashboard.admin.edit-pegawai') }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="space-y-4">
                                        <input type="hidden" name="nip" value="{{ $pegawai->nip }}">
                                        
                                        <div class="grid grid-cols-1 gap-6 md:grid-cols-12">
                                            <div class="md:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">Nama Pegawai</label>
                                            </div>
                                            <div class="md:col-span-9">
                                            <input type="text" class="w-full rounded-md border border-gray-300 px-3 py-2 focus:border-blue-500 focus:outline-none focus:ring-blue-500" 
                                                    name="pegawai" value="{{ $pegawai->nama_pegawai }}" required>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-1 gap-6 md:grid-cols-12">
                                            <div class="md:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">Jabatan</label>
                                            </div>
                                            <div class="md:col-span-9">
                                            <select class="w-full rounded-md border border-gray-300 px-3 py-2 focus:border-blue-500 focus:outline-none focus:ring-blue-500" name="jabatan" required>
                                            <option value="{{ $pegawai->id_jabatan }}" selected>{{ $pegawai->jabatan->nama_jabatan }}</option>
                                                @foreach ($jabatan as $jab)
                                                <option value="{{ $jab->id_jabatan }}">
                                                    {{ $jab->nama_jabatan }}
                                                </option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-1 gap-6 md:grid-cols-12">
                                            <div class="md:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">Golongan</label>
                                            </div>
                                            <div class="md:col-span-9">
                                            <select class="w-full rounded-md border border-gray-300 px-3 py-2 focus:border-blue-500 focus:outline-none focus:ring-blue-500" name="golongan" required>
                                            <option value="{{ $pegawai->id_golongan }}" selected>{{ $pegawai->golongan->nama_golongan }}</option>
                                                @foreach ($golongan as $gol)
                                                <option value="{{ $gol->id_golongan }}">
                                                    {{ $gol->nama_golongan }}
                                                </option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>

                                        <div class="border-t pt-4">
                                            <div class="flex justify-end gap-x-3">
                                            <button type="button" data-modal-hide="modaleditpegawai{{ $pegawai->nip }}" 
                                                    class="rounded-md bg-gray-500 px-4 py-2 text-sm font-medium text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                                Batal
                                            </button>
                                            <button type="submit" class="rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                                Simpan Perubahan
                                            </button>
                                            </div>
                                        </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                                </div>

                            <!-- modal delete -->
                                <div id="modaldeletepegawai{{ $pegawai->nip }}" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50 p-4">
                                <div class="w-full max-w-md rounded-lg bg-white shadow-xl">
                                    <div class="border-b p-4">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-sm font-semibold text-gray-800">Hapus Pegawai {{ $pegawai->nama_pegawai }}</h3>
                                        <button type="button" class="text-gray-400 hover:text-gray-500" data-modal-hide="modaldeletepegawai{{ $pegawai->nip}}">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        </button>
                                    </div>
                                    </div>
                                    <div class="p-6">
                                    <form action="{{ route('dashboard.admin.delete-pegawai') }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id_pegawai" value="{{ $pegawai->id_pegawai }}">
                                        
                                        <div class="space-y-4">
                                        <div class="text-center">
                                            <svg class="mx-auto h-12 w-12 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                            </svg>
                                            <h4 class="mt-2 text-lg font-medium text-gray-900">Konfirmasi Penghapusan</h4>
                                            <p class="mt-1 text-gray-600">Anda ingin menghapus Pegawai {{ $pegawai->nama_pegawai }}</p>
                                            <p class="mt-1 text-sm text-red-600">Semua data user, cuti, knp dan kgb akan hilang!</p>
                                        </div>

                                        <div class="mt-6 flex justify-center space-x-4">
                                            <button type="button" data-modal-hide="modaldeletepegawai{{ $pegawai->nip }}" 
                                                    class="rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                            Tidak
                                            </button>
                                            <button type="submit" 
                                                    class="rounded-md bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                            Ya, Hapus
                                            </button>
                                        </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                                </div>
                            <!-- end modal delete -->


                                <!-- modal tambah -->
                                <div id="modaltambahpegawai" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50 p-4 {{ (session('error') || $errors->any()) ? 'flex' : 'hidden' }} " >
                                <div class="w-full max-w-2xl rounded-lg bg-white shadow-xl">
                                    <div class="border-b p-4">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-xl font-semibold text-gray-800">Form Tambah Pegawai</h3>
                                        <button type="button" class="text-gray-400 hover:text-gray-500" data-modal-hide="modaltambahpegawai">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        </button>
                                    </div>
                                    </div>
                                    <div class="p-6">
                                    <form class="" action="{{ route('dashboard.admin.add-pegawai') }}" method="POST" data-parsley-validate>
                                        @csrf
                                        <div class="space-y-4">
                                        <div class="grid grid-cols-1 gap-6 md:grid-cols-12">
                                        <div class="md:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">Nama Pegawai</label>
                                        </div>
                                        <div class="md:col-span-9">
                                            <input type="text" name="nama" class="w-full rounded-md border border-gray-300 px-3 py-2 focus:border-blue-500 focus:outline-none focus:ring-blue-500" placeholder="Nama Pegawai" required>
                                        </div>
                                        </div>

                                        <div class="grid grid-cols-1 gap-6 md:grid-cols-12">
                                        <div class="md:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">Nip</label>
                                        </div>
                                        <div class="md:col-span-9">
                                            <input type="number" name="nip" class="w-full rounded-md border border-gray-300 px-3 py-2 focus:border-blue-500 focus:outline-none focus:ring-blue-500" placeholder="NIP" required>
                                        </div>
                                        </div>

                                        <div class="grid grid-cols-1 gap-6 md:grid-cols-12">
                                        <div class="md:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">Hak Akses</label>
                                        </div>
                                        <div class="md:col-span-9">
                                            <select class="w-full rounded-md border border-gray-300 px-3 py-2 focus:border-blue-500 focus:outline-none focus:ring-blue-500" name="jabatan" required>
                                            <option value="" selected disabled>-- Pilih Jabatan --</option>
                                            @foreach ($jabatan as $jab)
                                                <option value="{{ $jab->id_jabatan }}">
                                                    {{ $jab->nama_jabatan }}
                                                </option>
                                            @endforeach
                                            </select>
                                        </div>
                                        </div>

                                        <div class="grid grid-cols-1 gap-6 md:grid-cols-12">
                                        <div class="md:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">Hak Akses</label>
                                        </div>
                                        <div class="md:col-span-9">
                                            <select class="w-full rounded-md border border-gray-300 px-3 py-2 focus:border-blue-500 focus:outline-none focus:ring-blue-500" name="golongan" required>
                                            <option value="" selected disabled>-- Pilih Golongan --</option>
                                            @foreach ($golongan as $gol)
                                                <option value="{{ $gol->id_golongan }}">
                                                    {{ $gol->nama_golongan }}
                                                </option>
                                            @endforeach
                                            </select>
                                        </div>
                                        </div>
                                        <div class="border-t pt-4">
                                        <div class="flex justify-end">
                                            <button type="submit" class="rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" name="submit">
                                            Submit
                                            </button>
                                        </div>
                                        </div>
                                       </div>
                                    </form>
                                    </div>
                                </div>
                                </div>
                                <!-- end modal tambah -->
            @endforeach
            </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
