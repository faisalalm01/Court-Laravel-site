@extends('dashboard.index')

@section('content')
    <div class="p-3">
        <div class="flex justify-between items-center">
            <div class="title_left">
                <h3 class="text-2xl font-semibold">Daftar Golongan</h3>
            </div>
            <div class="title_right">
                <nav aria-label="breadcrumb">
                    <ol class="flex space-x-2 text-gray-600">
                        <li><a href="#" class="hover:underline">Home</a> /</li>
                        <li class="text-gray-800 font-medium">Golongan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="p-3">
        <div class="bg-white shadow rounded-lg p-4">
            <div class="mb-4">
        <div class="flex justify-between items-center mb-4">
            <div>
                <h2 class="text-xl font-bold">Daftar Golongan</h2>
                <p class="text-sm text-gray-500">Data golongan pegawai Pengadilan Negeri Purwokerto</p>
            </div>            <div>
                <h2 class="text-xl font-bold">Daftar KGB</h2>
                <p class="text-sm text-gray-500">Kenaikan Gaji Berkala Pengadilan Negeri Purwokerto</p>
            </div>
            <div class="flex space-x-2">
                <a href="#" data-toggle="modal" data-modal-toggle="modaltambahgolongan" class="bg-teal-500 hover:bg-teal-600 text-white px-4 py-2 rounded flex items-center" data-toggle="modal" data-target=".btn-tambah-kgb">
                    <i class="fa fa-plus-circle mr-2"></i> Tambah Golongan
                </a>
            </div>
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
                            <th>Nama Golongan</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $golongan)
                            <tr class="hover:bg-gray-50">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $golongan->nama_golongan }}</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" data-toggle="modal"
                                        data-modal-toggle="modalviewgolongan{{ $golongan->id_golongan }}"><i
                                            class="fa fa-eye"></i>
                                        View</a>
                                    <a href="#" class="btn btn-info" data-toggle="modal"
                                        data-modal-toggle="modaleditgolongan{{ $golongan->id_golongan }}"><i
                                            class="fa fa-edit"></i>
                                        Edit</a>
                                </td>
                                <!-- <td class="text-center">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </td> -->
                            </tr>

                            <!-- Modal edit-->
                            <div id="modaleditgolongan{{ $golongan->id_golongan }}" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50 p-4">
                                <div class="w-full max-w-2xl rounded-lg bg-white shadow-xl">
                                    <div class="border-b p-4">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-xl font-semibold text-gray-800">Form Edit Golongan</h3>
                                        <button type="button" class="text-gray-400 hover:text-gray-500" data-modal-hide="modaleditgolongan{{ $golongan->id_golongan }}">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        </button>
                                    </div>
                                    </div>
                                    <div class="p-6">
                                    <form action="{{ route('dashboard.admin.edit-golongan') }}" method="post">
                                        @csrf
                                        @method('PUT')                                        
                                        <div class="space-y-4">
                                        <input type="hidden" name="id_golongan" value="{{ $golongan->id_golongan }}">
                                        
                                        <div class="grid grid-cols-1 gap-6 md:grid-cols-12">
                                            <div class="md:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">Nama Golongan</label>
                                            </div>
                                            <div class="md:col-span-9">
                                            <input type="text" class="w-full rounded-md border border-gray-300 px-3 py-2 focus:border-blue-500 focus:outline-none focus:ring-blue-500" 
                                                    name="nama_golongan" value="{{ $golongan->nama_golongan }}" required>
                                            </div>
                                        </div>

                                        <div class="border-t pt-4">
                                            <div class="flex justify-end gap-x-3">
                                            <button type="button" data-modal-hide="modaleditgolongan{{ $golongan->id_golongan }}" 
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

                            <!-- modal view -->
                             <div id="modalviewgolongan{{ $golongan->id_golongan }}"
                                class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50">
                                <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl">
                                    <div class="p-6">
                                        <h3 class="text-xl font-bold mb-4">Detail golongan -
                                            {{ $golongan->nama_golongan }}
                                        </h3>
                                        <!-- Konten modal -->
                                        <div class="space-y-3">
                                            <p><strong>Nama:</strong> {{ $golongan->nama_golongan }}</p>

                                            <!-- Data lainnya -->
                                        </div>
                                    </div>

                                    <div class="bg-gray-50 px-6 py-3 flex justify-end">
                                        <button type="button" data-modal-hide="modalviewgolongan{{ $golongan->id_golongan }}"
                                            class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-lg">
                                            Tutup
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- modal tambah -->
                            <div id="modaltambahgolongan" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50 p-4 {{ (session('error') || $errors->any()) ? 'flex' : 'hidden' }}c">
                                <div class="w-full max-w-2xl rounded-lg bg-white shadow-xl">
                                    <div class="border-b p-4">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-xl font-semibold text-gray-800">Form Tambah Golongan</h3>
                                        <button type="button" class="text-gray-400 hover:text-gray-500" data-modal-hide="modaltambahgolongan">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        </button>
                                    </div>
                                    </div>
                                    <div class="p-6">
                                    <form class="" action="{{ route('dashboard.admin.add-golongan') }}" method="POST" data-parsley-validate>
                                        @csrf
                                        <div class="space-y-4">
                                        <div class="grid grid-cols-1 gap-6 md:grid-cols-12">
                                        <div class="md:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">Nama Golongan</label>
                                        </div>
                                        <div class="md:col-span-9">
                                            <input type="text" name="nama_golongan" class="w-full rounded-md border border-gray-300 px-3 py-2 focus:border-blue-500 focus:outline-none focus:ring-blue-500" placeholder="Nama Golongan" required>
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
            @endforeach
            </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
