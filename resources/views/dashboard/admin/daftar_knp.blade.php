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
                                <td class="px-6 py-4 text-sm whitespace-nowrap">{{ $loop->iteration }}s</td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap">{{ $d->pegawai->nama_pegawai }}s</td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap">{{ $d->pegawai->nip }}s</td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap">{{ $d->pegawai->jabatan->nama_jabatan }}s
                                </td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap">{{ $d->pegawai->golongan->nama_golongan }}s
                                </td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap">{{ $d->knp_terakhir }}s</td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap">{{ $d->knp_datang }}s</td>
                                <td class="max-w-xs px-6 py-4 overflow-hidden text-sm overflow-ellipsis">
                                    <div class="line-clamp-2">{{ $d->keterangan }}s</div>
                                </td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap">{{ $d->pensiun }}s</td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap">{{ $d->timestamp }}s</td>
                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                                    <div class="flex space-x-2">
                                        <a href="#" class="text-blue-600 hover:text-blue-900" data-toggle="modal"
                                            data-modal-toggle="modalviewknp{{ $d->pegawai->nip }}">
                                            <i class="mr-1 fas fa-eye"></i> View
                                        </a>
                                        <a href="#" class="text-yellow-600 hover:text-yellow-900" data-toggle="modal"
                                            data-modal-toggle="modaleditknp{{ $d->pegawai->nip }}">
                                            <i class="mr-1 fas fa-edit"></i> Edit
                                        </a>
                                        <a href="#" class="text-red-600 hover:text-red-900" data-toggle="modal"
                                            data-modal-toggle="modaldeleteknp{{ $d->pegawai->nip }}">
                                            <i class="mr-1 fas fa-trash"></i> Delete
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
