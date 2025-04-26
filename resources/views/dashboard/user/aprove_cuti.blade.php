@extends('dashboard.index')

@section('content')
    <div class="p-3">
        <div class="d-flex justify-between items-center">
            <!-- Title Kiri -->
            <div class="title_left">
                <h3 class="text-2xl font-semibold">Daftar Approval</h3>
            </div>

            <!-- Breadcrumb Kanan -->
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
                        <tr class="bg-gray-100 text-left text-gray-700 uppercase text-sm leading-normal">
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
                                    <a href="#" class="text-blue-600 hover:underline" data-toggle="modal" data-target="#modalviewcuti{{ $cuti->id_cutipegawai }}">View</a>
                                    |
                                    <a href="/dashboard/user/approve-update-cuti/{{ $cuti->id_cutipegawai }}" class="text-green-600 hover:underline">Approve</a>
                                </td>
                            </tr>

                            <!-- Modal (kalau mau sekalian dimasukin) -->
                            <div class="modal fade" id="modalviewcuti{{ $cuti->id_cutipegawai }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Detail Cuti - {{ $cuti->pegawai->nama_pegawai }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- isi detail cuti -->
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
