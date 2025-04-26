@extends('dashboard.index')

@section('content')
    <div class="p-3">
        <div class="flex justify-between items-center">
            <div class="title_left">
                <h3 class="text-2xl font-semibold">Daftar Approval</h3>
            </div>
            <div class="title_right">
                <nav aria-label="breadcrumb">
                    <ol class="flex space-x-2 text-gray-600">
                        <li><a href="#" class="hover:underline">Home</a> /</li>
                        <li class="text-gray-800 font-medium">Daftar Approval</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="p-3">
        <div class="bg-white shadow rounded-lg p-4">
            <div class="mb-4">
                <h2 class="text-xl font-bold">Daftar Menunggu Approval</h2>
                <p class="text-sm text-gray-500">Daftar cuti yang menunggu approval dari atasan</p>
            </div>

            <div class="overflow-x-auto">
                <table id="data-tables" class="min-w-full table-auto border-collapse">
                    <thead>
                        <tr class="bg-gray-100 text-gray-700 uppercase text-sm leading-normal">
                            <th class="p-3 border-b">No</th>
                            <th class="p-3 border-b">Nama</th>
                            <th class="p-3 border-b">Jenis Cuti</th>
                            <th class="p-3 border-b">Alasan Cuti</th>
                            <th class="p-3 border-b">Lama Cuti</th>
                            <th class="p-3 border-b">Dari Tanggal</th>
                            <th class="p-3 border-b">Sampai Dengan</th>
                            <th class="p-3 border-b">Alamat</th>
                            <th class="p-3 border-b">Status</th>
                            <th class="p-3 border-b">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $cuti)
                            <tr class="hover:bg-gray-50">
                                <td class="p-3 border-b">{{ $loop->iteration }}</td>
                                <td class="p-3 border-b">{{ $cuti->pegawai->nama_pegawai }}</td>
                                <td class="p-3 border-b">{{ $cuti->jenis_cuti }}</td>
                                <td class="p-3 border-b">{{ $cuti->alasan_cuti }}</td>
                                <td class="p-3 border-b">{{ $cuti->lama_cuti }} {{ $cuti->ket_lama_cuti }}</td>
                                <td class="p-3 border-b">{{ $cuti->dari_tanggal }}</td>
                                <td class="p-3 border-b">{{ $cuti->sampai_dengan }}</td>
                                <td class="p-3 border-b">{{ $cuti->alamat }}</td>
                                <td class="p-3 border-b">
                                    <span class="px-2 py-1 rounded bg-yellow-100 text-yellow-800">
                                        {{ $cuti->status_cuti }}
                                    </span>
                                </td>
                                <td class="p-3 border-b">
                                    <a href="#" class="text-blue-600 hover:underline" data-modal-toggle="modalviewcuti{{ $cuti->id_cutipegawai }}">View</a> |
                                    <a href="/dashboard/user/approve-update-cuti/{{ $cuti->id_cutipegawai }}" class="text-green-600 hover:underline">Approve</a>
                                </td>
                            </tr>
                            
                            <!-- Modal -->
                            <div id="modalviewcuti{{ $cuti->id_cutipegawai }}" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50">
                                <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl">
                                    <div class="p-6">
                                        <h3 class="text-xl font-bold mb-4">Detail Cuti - {{ $cuti->pegawai->nama_pegawai }}</h3>
                                        <!-- Konten modal -->
                                        <div class="space-y-3">
                                            <p><strong>Jenis Cuti:</strong> {{ $cuti->jenis_cuti }}</p>
                                            <p><strong>Alasan:</strong> {{ $cuti->alasan_cuti }}</p>
                                            <p><strong>Lama:</strong> {{ $cuti->lama_cuti }} {{ $cuti->ket_lama_cuti }}</p>
                                            <p><strong>Dari:</strong> {{ $cuti->dari_tanggal }}</p>
                                            <p><strong>Sampai:</strong> {{ $cuti->sampai_dengan }}</p>
                                            <p><strong>Alamat:</strong> {{ $cuti->alamat }}</p>
                                            <p><strong>Status:</strong> {{ $cuti->status_cuti }}</p>
                                            <!-- Data lainnya -->
                                        </div>
                                    </div>
                                    <div class="bg-gray-50 px-6 py-3 flex justify-end">
                                        <button type="button" data-modal-hide="modalviewcuti{{ $cuti->id_cutipegawai }}"
                                            class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-lg">
                                            Tutup
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
@endsection
