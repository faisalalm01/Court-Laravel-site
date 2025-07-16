@extends('dashboard.index')

@section('content')
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
     <div class="text-gray-500 text-sm">
                <h2 class="text-cyan-900 text-xl">Syarat-syarat Kenaikan Pangkat Reguler :</h2>
                <h2>*Salinan/Fotocopy yang disahkan dari SK CPNS</h2>
                <h2>*Salinan/Fotocopy yang disahkan dari SK PNS</h2>
                <h2>*Salinan/Fotocopy yang disahkan dari SK Pangkat terakhir</h2>
                <h2>*Salinan/Fotocopy yang disahkan dari SKP dalam 2(dua) tahun terakhir</h2>
                <h2>*Salinan/Fotocopy yang disahkan dari Karpeg/small></h2>
                <h2>*Nota Persetujuan BKN</h2>
                <h2 class="text-cyan-900 text-xl">Pengajuan Usul Kenaikan Pangkat :</h2>
                <h2>- Ketua Pengadilan Tingkat Pertama mengajukan usul kenaikan pangkat bagi pegawai teknis diinstansinya masing-masing kepada Ketua Pengadilan Tingkat Banding, untuk diteruskan ke Ditjen terkait.</h2>
                <h2>- Ketua Pengadilan Tingkat Banding mengajukan usul kenaikan pangkat bagi pegawai teknis di instansinya masing-masing kepada Ditjen terkait.</h2>
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
                <a href="#" class="bg-teal-500 hover:bg-teal-600 text-white px-4 py-2 rounded flex items-center" data-toggle="modal" data-modal-toggle="modaltambahknp">
                    <i class="fa fa-plus-circle mr-2"></i> Tambah KNP
                </a>
                <a href="export_cuti.php" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded flex items-center">
                    <i class="fa fa-download mr-2"></i> Export Excel
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

        <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
            <table id="data-tables" class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left uppercase tracking-wider whitespace-nowrap">No</th>
                        <th scope="col" class="px-6 py-3 text-left uppercase tracking-wider whitespace-nowrap">Nama</th>
                        <th scope="col" class="px-6 py-3 text-left uppercase tracking-wider whitespace-nowrap">NIP</th>
                        <th scope="col" class="px-6 py-3 text-left uppercase tracking-wider whitespace-nowrap">Jabatan</th>
                        <th scope="col" class="px-6 py-3 text-left uppercase tracking-wider whitespace-nowrap">Golongan</th>
                        <th scope="col" class="px-6 py-3 text-left uppercase tracking-wider whitespace-nowrap">KNP terakhir</th>
                        <th scope="col" class="px-6 py-3 text-left uppercase tracking-wider whitespace-nowrap">KNP yang akan datang</th>
                        <th scope="col" class="px-6 py-3 text-left uppercase tracking-wider whitespace-nowrap min-w-[150px]">Keterangan</th>
                        <th scope="col" class="px-6 py-3 text-left uppercase tracking-wider whitespace-nowrap">Pensiun</th>
                        <th scope="col" class="px-6 py-3 text-left uppercase tracking-wider whitespace-nowrap">Penetapan</th>
                        <th scope="col" class="px-6 py-3 text-left uppercase tracking-wider whitespace-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($data as $d)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $loop->iteration }}s</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $d->pegawai->nama_pegawai }}s</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $d->pegawai->nip }}s</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $d->pegawai->jabatan->nama_jabatan }}s</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $d->pegawai->golongan->nama_golongan }}s</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $d->knp_terakhir }}s</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $d->knp_datang }}s</td>
                        <td class="px-6 py-4 text-sm max-w-xs overflow-hidden overflow-ellipsis">
                            <div class="line-clamp-2">{{ $d->keterangan }}s</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $d->pensiun }}s</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $d->timestamp }}s</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <a href="#" class="text-blue-600 hover:text-blue-900" data-toggle="modal" data-modal-toggle="modalviewknp{{ $d->pegawai->nip }}">
                                    <i class="fas fa-eye mr-1"></i> View
                                </a>
                                <a href="#" class="text-yellow-600 hover:text-yellow-900" data-toggle="modal" data-modal-toggle="modaleditknp{{ $d->pegawai->nip }}">
                                    <i class="fas fa-edit mr-1"></i> Edit
                                </a>
                                <a href="#" class="text-red-600 hover:text-red-900" data-toggle="modal" data-modal-toggle="modaldeleteknp{{ $d->pegawai->nip }}">
                                    <i class="fas fa-trash mr-1"></i> Delete
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

