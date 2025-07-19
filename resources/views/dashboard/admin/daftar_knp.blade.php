@extends('dashboard.index')

@section('content')
    <div class="p-3">

        <div class="flex items-center justify-between">
            <div class="title_left">
                <h3 class="text-2xl font-semibold">KNP</h3>
            </div>
            <div class="title_right">
                <nav aria-label="breadcrumb">
                    <ol class="flex space-x-2 text-gray-600">
                        <li><a href="#" class="hover:underline">Home</a> /</li>
                        <li class="font-medium text-gray-800">KNP</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="text-sm text-gray-500">
            <h2 class="text-xl text-cyan-900">Syarat-syarat Kenaikan Pangkat Reguler :</h2>
            <h2>*Salinan/Fotocopy yang disahkan dari SK CPNS</h2>
            <h2>*Salinan/Fotocopy yang disahkan dari SK PNS</h2>
            <h2>*Salinan/Fotocopy yang disahkan dari SK Pangkat terakhir</h2>
            <h2>*Salinan/Fotocopy yang disahkan dari SKP dalam 2(dua) tahun terakhir</h2>
            <h2>*Salinan/Fotocopy yang disahkan dari Karpeg</h2>
            <h2>*Nota Persetujuan BKN</h2>
            <h2 class="text-xl text-cyan-900">Pengajuan Usul Kenaikan Pangkat :</h2>
            <h2>- Ketua Pengadilan Tingkat Pertama mengajukan usul kenaikan pangkat bagi pegawai teknis diinstansinya
                masing-masing kepada Ketua Pengadilan Tingkat Banding, untuk diteruskan ke Ditjen terkait.</h2>
            <h2>- Ketua Pengadilan Tingkat Banding mengajukan usul kenaikan pangkat bagi pegawai teknis di instansinya
                masing-masing kepada Ditjen terkait.</h2>
        </div>
    </div>

    <div class="p-3">
        <div class="p-4 bg-white rounded-lg shadow">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h2 class="text-xl font-bold">Daftar KNP</h2>
                    <p class="text-sm text-gray-500">Kenaikan Pangkat Pegawai Pengadilan Negeri Purwokerto</p>
                </div>
                <div class="flex gap-2">
                    <a href="#" class="flex items-center px-4 py-2 text-white bg-teal-500 rounded hover:bg-teal-600"
                        data-toggle="modal" data-modal-toggle="modaltambahknp">
                        <i class="mr-2 fa fa-plus-circle"></i> Tambah KNP
                    </a>
                    <a href="export_cuti.php"
                        class="flex items-center px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600">
                        <i class="mr-2 fa fa-download"></i> Export Excel
                    </a>
                </div>
            </div>

            @if (session('success'))
                <div class="relative px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded"
                    role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" data-dismiss="alert"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session('error'))
                <div class="relative px-4 py-3 mb-4 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                    <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" data-dismiss="alert"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="overflow-x-auto border border-gray-200 rounded-lg shadow-sm">
                <table id="data-tables" class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 tracking-wider text-left uppercase whitespace-nowrap">No
                            </th>
                            <th scope="col" class="px-6 py-3 tracking-wider text-left uppercase whitespace-nowrap">Nama
                            </th>
                            <th scope="col" class="px-6 py-3 tracking-wider text-left uppercase whitespace-nowrap">NIP
                            </th>
                            <th scope="col" class="px-6 py-3 tracking-wider text-left uppercase whitespace-nowrap">
                                Jabatan</th>
                            <th scope="col" class="px-6 py-3 tracking-wider text-left uppercase whitespace-nowrap">
                                Golongan</th>
                            <th scope="col" class="px-6 py-3 tracking-wider text-left uppercase whitespace-nowrap">KNP
                                terakhir</th>
                            <th scope="col" class="px-6 py-3 tracking-wider text-left uppercase whitespace-nowrap">KNP
                                yang akan datang</th>
                            <th scope="col"
                                class="px-6 py-3 text-left uppercase tracking-wider whitespace-nowrap min-w-[150px]">
                                Keterangan</th>
                            <th scope="col" class="px-6 py-3 tracking-wider text-left uppercase whitespace-nowrap">
                                Pensiun</th>
                            <th scope="col" class="px-6 py-3 tracking-wider text-left uppercase whitespace-nowrap">
                                Penetapan</th>
                            <th scope="col" class="px-6 py-3 tracking-wider text-left uppercase whitespace-nowrap">Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($data as $d)
                            <tr class="transition-colors hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm whitespace-nowrap">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap">{{ $d->pegawai->nama_pegawai }}</td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap">{{ $d->pegawai->nip }}s</td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap">{{ $d->pegawai->jabatan->nama_jabatan }}
                                </td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap">{{ $d->pegawai->golongan->nama_golongan }}
                                </td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap">{{ $d->knp_terakhir }}</td>
                                <td class="max-w-xs px-6 py-4 overflow-hidden text-sm overflow-ellipsis">
                                    <div class="line-clamp-2">{{ $d->knp_datang }}</div>
                                </td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap">{{ $d->keterangan }}</td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap">{{ $d->pensiun }}</td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap"></td>
                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                                    <div class="flex space-x-2">
                                        <a href="#" class="text-blue-600 hover:text-blue-900" data-toggle="modal"
                                            data-modal-toggle="modalviewknp{{ $d->pegawai->nip }}">
                                            <i class="mr-1 fas fa-eye"></i> View
                                        </a>
                                        <a href="#" class="text-yellow-600 hover:text-yellow-900" data-toggle="modal"
                                            data-modal-toggle="modaleditknp{{ $d->id_knppegawai }}">
                                            <i class="mr-1 fas fa-edit"></i> Edit
                                        </a>
                                        <a href="#" class="text-red-600 hover:text-red-900" data-toggle="modal"
                                            data-modal-toggle="modaldeleteknp{{ $d->id_knppegawai }}">
                                            <i class="mr-1 fas fa-trash"></i> Delete
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <!-- view -->
                            <div id="modalviewknp{{ $d->pegawai->nip }}"
                                class="fixed inset-0 z-50 items-center justify-center hidden bg-black bg-opacity-50">
                                <div class="w-full max-w-2xl bg-white rounded-lg shadow-xl">
                                    <div class="p-6">
                                        <h3 class="mb-4 text-xl font-bold">Detail KNP - {{ $d->pegawai->nama_pegawai }}
                                        </h3>
                                        <!-- Konten modal -->
                                        <div class="space-y-3">
                                            <p><strong>Nama Lengkap:</strong> {{ $d->pegawai->nama_pegawai }}</p>
                                            <p><strong>NIP:</strong> {{ $d->pegawai->nip }}</p>
                                            <p><strong>Jabatan:</strong> {{ $d->pegawai->jabatan->nama_jabatan }}</p>
                                            <p><strong>Golongan:</strong> {{ $d->pegawai->golongan->nama_golongan }}</p>
                                            <p><strong>KNP Terakhir:</strong> {{ $d->knp_terakhir }}</p>
                                            <p><strong>KNP Datang:</strong> {{ $d->knp_datang }}</p>
                                            <p><strong>Keterangan:</strong> {{ $d->keterangan }}</p>
                                            <p><strong>Pensiun:</strong> {{ $d->pensiun }}</p>
                                            <!-- Data lainnya -->
                                        </div>
                                    </div>

                                    <div class="flex justify-end px-6 py-3 bg-gray-50">
                                        <button type="button" data-modal-hide="modalviewknp{{ $d->pegawai->nip }}"
                                            class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">
                                            Tutup
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- end modal view -->



                            <!-- modal delete -->
                            <div id="modaldeleteknp{{ $d->id_knppegawai }}"
                                class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50 p-4">
                                <div class="w-full max-w-md rounded-lg bg-white shadow-xl">
                                    <div class="border-b p-4">
                                        <div class="flex items-center justify-between">
                                            <h3 class="text-sm font-semibold text-gray-800">Hapus Pegawai
                                                {{ $d->id_knppegawai }}</h3>
                                            <button type="button" class="text-gray-400 hover:text-gray-500"
                                                data-modal-hide="modaldeleteknp{{ $d->id_knppegawai }}"">
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="p-6">
                                        <form action="{{ route('dashboard.admin.delete.daftar-knp', $d->id_knppegawai) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <div class="space-y-4">
                                                <div class="text-center">
                                                    <svg class="mx-auto h-12 w-12 text-red-500" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                    </svg>
                                                    <h4 class="mt-2 text-lg font-medium text-gray-900">Konfirmasi
                                                        Penghapusan - {{ $d->pegawai->nama_pegawai }}</h4>
                                                    <p class="mt-1 text-gray-600">Anda ingin menghapus KNP Pegawaiini?</p>
                                                    {{-- <p class="mt-1 text-sm text-red-600">Semua data user, cuti, knp dan kgb
                                                        akan hilang!</p> --}}
                                                </div>

                                                <div class="mt-6 flex justify-center space-x-4">
                                                    <button type="button"
                                                        data-modal-hide="modaldeleteknp{{ $d->id_knppegawai }}"
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
                            <!-- modal delete end -->
                            <!-- !-- modal edit -->
                            <div id="modaleditknp{{ $d->id_knppegawai }}"
                                class="fixed inset-0 z-50 items-center justify-center hidden p-4 bg-black bg-opacity-50">
                                <div class="w-full max-w-3xl bg-white rounded-lg shadow-xl">
                                    <div class="p-4 border-b">
                                        <div class="flex items-center justify-between">
                                            <h3 class="text-xl font-semibold text-gray-800">Form Edit KNP</h3>
                                            <button type="button" class="text-gray-400 hover:text-gray-500"
                                                data-modal-hide="modaltambahknp">
                                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="p-6">
                                        <form method="POST"
                                            action="{{ route('dashboard.admin.update.daftar-knp', $d->id_knppegawai) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="space-y-4">
                                                <div class="grid grid-cols-1 gap-6 md:grid-cols-12">
                                                    <div class="md:col-span-3">
                                                        <label
                                                            class="block text-sm font-medium text-gray-700">Pegawai</label>
                                                    </div>
                                                    <div class="md:col-span-9">
                                                        <select name="id_pegawai" required
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-500">
                                                            <option value="" selected disabled>-- Pilih Pegawai --
                                                            </option>
                                                            @foreach ($pegawai as $peg)
                                                                <option value="{{ $peg->id_pegawai }}" name="id_pegawai"
                                                                    {{ $d->id_pegawai == $peg->id_pegawai ? 'selected' : '' }}>
                                                                    {{ $peg->nama_pegawai }} | {{ $peg->nip }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                {{-- KNP Terakhir --}}
                                                <div class="grid grid-cols-1 gap-6 md:grid-cols-12">
                                                    <div class="md:col-span-3">
                                                        <label class="block text-sm font-medium text-gray-700">KNP
                                                            Terakhir</label>
                                                    </div>
                                                    <div class="md:col-span-9">
                                                        <input type="date" name="knp_terakhir" required
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-500"
                                                            value="{{ $d->knp_terakhir }}">
                                                    </div>
                                                </div>

                                                {{-- KNP Datang --}}
                                                <div class="grid grid-cols-1 gap-6 md:grid-cols-12">
                                                    <div class="md:col-span-3">
                                                        <label class="block text-sm font-medium text-gray-700">KNP Yang
                                                            Akan
                                                            Datang</label>
                                                    </div>
                                                    <div class="md:col-span-9">
                                                        <input type="date" name="knp_datang" required
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-500"
                                                            value="{{ $d->knp_datang }}">
                                                    </div>
                                                </div>

                                                {{-- Keterangan / Golongan --}}
                                                <div class="grid grid-cols-1 gap-6 md:grid-cols-12">
                                                    <div class="md:col-span-3">
                                                        <label class="block text-sm font-medium text-gray-700">Keterangan
                                                            (Golongan)
                                                        </label>
                                                    </div>
                                                    <div class="md:col-span-9">
                                                        <select name="keterangan"
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-500">
                                                            <option value="" disabled>-- Pilih Golongan --</option>
                                                            @foreach ($golongan as $gol)
                                                                <option value="{{ $gol->nama_golongan }}"
                                                                    {{ $d->keterangan == $gol->nama_golongan ? 'selected' : '' }}>
                                                                    {{ $gol->nama_golongan }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                </div>

                                                {{-- Pensiun --}}
                                                <div class="grid grid-cols-1 gap-6 md:grid-cols-12">
                                                    <div class="md:col-span-3">
                                                        <label
                                                            class="block text-sm font-medium text-gray-700">Pensiun</label>
                                                    </div>
                                                    <div class="md:col-span-9">
                                                        <input type="date" name="pensiun"
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-500"
                                                            value="{{ $d->pensiun }}">
                                                    </div>
                                                </div>

                                            </div>

                                            {{-- Tombol Submit --}}
                                            <div class="pt-6 mt-4 border-t">
                                                <div class="flex justify-end">
                                                    <button type="submit"
                                                        class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                        Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- end edit modal -->
                        @endforeach

                        <!-- !-- modal add -->
                        <div id="modaltambahknp"
                            class="fixed inset-0 z-50 items-center justify-center hidden p-4 bg-black bg-opacity-50">
                            <div class="w-full max-w-3xl bg-white rounded-lg shadow-xl">
                                <div class="p-4 border-b">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-xl font-semibold text-gray-800">Form Tambah KNP</h3>
                                        <button type="button" class="text-gray-400 hover:text-gray-500"
                                            data-modal-hide="modaltambahknp">
                                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="p-6">
                                    <form method="POST" action="{{ route('dashboard.admin.daftar-knp') }}">
                                        @csrf
                                        <div class="space-y-4">

                                            {{-- Pegawai --}}
                                            <div class="grid grid-cols-1 gap-6 md:grid-cols-12">
                                                <div class="md:col-span-3">
                                                    <label class="block text-sm font-medium text-gray-700">Pegawai</label>
                                                </div>
                                                <div class="md:col-span-9">
                                                    <select name="id_pegawai" required
                                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-500">
                                                        <option value="" selected disabled>-- Pilih Pegawai --
                                                        </option>
                                                        @foreach ($pegawai as $peg)
                                                            <option value="{{ $peg->id_pegawai }}">
                                                                {{ $peg->nama_pegawai }} | {{ $peg->nip }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            {{-- KNP Terakhir --}}
                                            <div class="grid grid-cols-1 gap-6 md:grid-cols-12">
                                                <div class="md:col-span-3">
                                                    <label class="block text-sm font-medium text-gray-700">KNP
                                                        Terakhir</label>
                                                </div>
                                                <div class="md:col-span-9">
                                                    <input type="date" name="knp_terakhir" required
                                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-500">
                                                </div>
                                            </div>

                                            {{-- KNP Datang --}}
                                            <div class="grid grid-cols-1 gap-6 md:grid-cols-12">
                                                <div class="md:col-span-3">
                                                    <label class="block text-sm font-medium text-gray-700">KNP Yang Akan
                                                        Datang</label>
                                                </div>
                                                <div class="md:col-span-9">
                                                    <input type="date" name="knp_datang" required
                                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-500">
                                                </div>
                                            </div>

                                            {{-- Keterangan / Golongan --}}
                                            <div class="grid grid-cols-1 gap-6 md:grid-cols-12">
                                                <div class="md:col-span-3">
                                                    <label class="block text-sm font-medium text-gray-700">Keterangan
                                                        (Golongan)</label>
                                                </div>
                                                <div class="md:col-span-9">
                                                    <select name="keterangan"
                                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-500">
                                                        <option value="" selected disabled>-- Pilih Golongan --
                                                        </option>
                                                        @foreach ($golongan as $gol)
                                                            <option value="{{ $gol->nama_golongan }}">
                                                                {{ $gol->nama_golongan }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            {{-- Pensiun --}}
                                            <div class="grid grid-cols-1 gap-6 md:grid-cols-12">
                                                <div class="md:col-span-3">
                                                    <label class="block text-sm font-medium text-gray-700">Pensiun</label>
                                                </div>
                                                <div class="md:col-span-9">
                                                    <input type="date" name="pensiun"
                                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-500">
                                                </div>
                                            </div>

                                        </div>

                                        {{-- Tombol Submit --}}
                                        <div class="pt-6 mt-4 border-t">
                                            <div class="flex justify-end">
                                                <button type="submit"
                                                    class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end add modal -->


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
