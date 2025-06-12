@extends('dashboard.index')

@section('content')
<div class="p-3">
    <div class="flex justify-between items-center">
        <div class="title_left">
            <h3 class="text-2xl font-semibold">Cuti</h3>
        </div>
        <div class="title_right">
            <nav aria-label="breadcrumb">
                <ol class="flex space-x-2 text-gray-600">
                    <li><a href="#" class="hover:underline">Home</a> /</li>
                    <li class="text-gray-800 font-medium">Cuti</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="p-3">
    <div class="bg-white shadow rounded-lg p-4">
        <div class="flex justify-between items-center mb-4">
            <div>
                <h2 class="text-xl font-bold">Daftar Cuti</h2>
                <p class="text-sm text-gray-500">Daftar cuti pegawai pengadilan Negeri Purwokerto</p>
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
                        <th class="py-3 px-6 text-left">Jenis Cuti</th>
                        <th class="py-3 px-6 text-left">Alasan Cuti</th>
                        <th class="py-3 px-6 text-left">Lama Cuti</th>
                        <th class="py-3 px-6 text-left">Dari Tanggal</th>
                        <th class="py-3 px-6 text-left">Sampai Dengan</th>
                        <th class="py-3 px-6 text-center">Status</th>
                        <th class="py-3 px-6 text-center">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                        <tr class="hover:bg-gray-50 border-b border-gray-200">
                            <td class="whitespace-nowrap text-sm py-4 px-6">{{ $loop->iteration }}</td>
                            <td class="whitespace-nowrap text-sm py-4 px-6">{{ $d->pegawai->nama_pegawai }}</td>
                            <td class="whitespace-nowrap text-sm py-4 px-6">{{ $d->jenis_cuti }}</td>
                            <td class="whitespace-nowrap text-sm py-4 px-6">{{ $d->alasan_cuti }}</td>
                            <td class="whitespace-nowrap text-sm py-4 px-6">{{ $d->lama_cuti }} {{ $d->ket_lama_cuti }}</td>
                            <td class="whitespace-nowrap text-sm py-4 px-6">{{ $d->dari_tanggal }}</td>
                            <td class="whitespace-nowrap text-sm py-4 px-6">{{ $d->sampai_dengan }}</td>
                            <td class="whitespace-nowrap text-sm py-4 px-6 text-center">
                                <span class="px-3 py-1 rounded-md text-xs 
                                    {{ $d->status_cuti == 'Diajukan' || $d->status_cuti == 'Disetujui' ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }}">
                                    {{ $d->status_cuti }}
                                </span>
                            </td>
                            <td class="whitespace-nowrap text-sm py-4 px-6 text-center">
                                <span class="px-3 py-1 rounded-md text-xs bg-blue-200 text-blue-800">
                                    {{ $d->ket_status_cuti }}
                                </span>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
