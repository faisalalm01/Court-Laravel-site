@extends('dashboard.index')

@section('content')
<div class="flex flex-col items-center rounded-lg bg-white mb-7 py-8 shadow-sm px-5">
    <div class="flex items-center justify-between w-full border bg-gray-400 px-4 py-2 rounded-md">
        <div class="w-12 h-12 bg-gray-300 flex items-center justify-center rounded-full shadow">
            <i class="fas fa-lock text-gray-700"></i>
        </div>

        <div class="relative flex items-center justify-center w-20 h-20 bg-white border-4 border-gray-300 rounded-full shadow-lg">
            <img src="{{ Auth::user()->foto ? asset('images/profile/' . Auth::user()->foto) : 'https://st.depositphotos.com/1537427/3571/v/450/depositphotos_35717211-stock-illustration-vector-user-icon.jpg' }}"
                alt="Profile" class="w-full h-full rounded-full object-cover" />
        </div>

        <div class="w-12 h-12 bg-gray-300 flex items-center justify-center rounded-full shadow">
            <i class="fas fa-lock text-gray-700"></i>
        </div>
    </div>

    <div class="mt-4 text-center">
        <p class="text-2xl text-gray-600 font-semibold">Selamat Datang</p>
        <div class="flex gap-2">
            <p class="text-2xl text-gray-800 font-bold">{{ Auth::user()->pegawai->jabatan->nama_jabatan }}</p>
            <p class="text-2xl text-gray-800 font-semibold">{{ Auth::user()->pegawai->nama_pegawai }}</p>
        </div>
    </div>
</div>

<!-- Admin Card Section -->
@if(Auth::user()->role === 'admin' || Auth::user()->nip === '00')
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
    <!-- Users -->
    <div class="bg-white shadow rounded-lg p-4 transform transition hover:scale-[1.02]">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-blue-100 text-blue-500 mr-4">
                <i class="fa fa-users text-2xl"></i>
            </div>
            <div>
                <div class="text-3xl font-bold">{{ $userCount }}</div>
                <h3 class="text-lg font-semibold">Users</h3>
                <p class="text-sm text-gray-500">Jumlah users yang memakai aplikasi</p>
            </div>
        </div>
        <hr class="my-3">
        <div class="text-center">
            <a href="{{ route('dashboard.admin.data-users') }}" class="text-blue-500 hover:text-blue-700 text-sm">
                Tampilkan lebih banyak <i class="fa fa-arrow-circle-right ml-1"></i>
            </a>
        </div>
    </div>

    <!-- Pegawai -->
    <div class="bg-white shadow rounded-lg p-4 transform transition hover:scale-[1.02]">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-green-100 text-green-500 mr-4">
                <i class="fa fa-database text-2xl"></i>
            </div>
            <div>
                <div class="text-3xl font-bold">{{ $pegawaiCount }}</div>
                <h3 class="text-lg font-semibold">Pegawai</h3>
                <p class="text-sm text-gray-500">Jumlah seluruh pegawai di Pengadilan Negeri Purwokerto</p>
            </div>
        </div>
        <hr class="my-3">
        <div class="text-center">
            <a href="{{ route('dashboard.admin.data-pegawai') }}" class="text-blue-500 hover:text-blue-700 text-sm">
                Tampilkan lebih banyak <i class="fa fa-arrow-circle-right ml-1"></i>
            </a>
        </div>
    </div>
</div>
@endif

<!-- Tabel Data -->
<div class="w-full mb-5">
    <div class="rounded-lg shadow-md p-4 bg-white">
        <h2 class="text-xl mb-4">
            @if(Auth::user()->role === 'admin' || Auth::user()->nip === '00')
                Data Pegawai <small class="text-sm text-gray-500">Daftar pegawai Pengadilan Negeri Purwokerto</small>
            @else
                Daftar Pengajuan Cuti Anda <small class="text-sm text-gray-500">Menunggu approval atasan</small>
            @endif
        </h2>

        <div class="overflow-x-auto">
            <table id="data-tables" class="table-auto w-full">
                <thead>
                    <tr class="bg-gray-100">
                        @if(Auth::user()->role === 'admin' || Auth::user()->nip === '00')
                            <th class="py-2 px-4">No</th>
                            <th class="py-2 px-4">Nama</th>
                            <th class="py-2 px-4">NIP</th>
                            <th class="py-2 px-4">Jabatan</th>
                            <th class="py-2 px-4">Golongan</th>
                            <th class="py-2 px-4">Cuti</th>
                            <th class="py-2 px-4">KNP</th>
                            <th class="py-2 px-4">KGB</th>
                        @else
                            <th class="py-2 px-4">No</th>
                            <th class="py-2 px-4">Nama</th>
                            <th class="py-2 px-4">Jenis Cuti</th>
                            <th class="py-2 px-4">Alasan Cuti</th>
                            <th class="py-2 px-4">Lama Cuti</th>
                            <th class="py-2 px-4">Dari</th>
                            <th class="py-2 px-4">Sampai</th>
                            <th class="py-2 px-4">Status</th>
                            <th class="py-2 px-4">Keterangan</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @if(Auth::user()->role === 'admin' || Auth::user()->nip === '00')
                        @foreach ($dataPeg as $user)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-4">{{ $loop->iteration }}</td>
                            <td class="py-3 px-4">{{ $user->nama_pegawai }}</td>
                            <td class="py-3 px-4">{{ $user->nip }}</td>
                            <td class="py-3 px-4">{{ $user->jabatan->nama_jabatan }}</td>
                            <td class="py-3 px-4">{{ $user->golongan->nama_golongan }}</td>
                            <td class="py-3 px-4">
                                <a href="#" class="bg-green-500 rounded-md px-2 py-1 text-xs text-white" data-modal-toggle="pegawaidetail{{ $user->nip }}">lihat detail</a>
                            </td>
                            <td class="py-3 px-4">
                                <a href="#" class="bg-green-500 rounded-md px-2 py-1 text-xs text-white">lihat detail</a>
                            </td>
                            <td class="py-3 px-4">
                                <a href="#" class="bg-green-500 rounded-md px-2 py-1 text-xs text-white">lihat detail</a>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        @foreach ($data as $d)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-4">{{ $loop->iteration }}</td>
                            <td class="py-3 px-4">{{ $d->pegawai->nama_pegawai }}</td>
                            <td class="py-3 px-4">{{ $d->jenis_cuti }}</td>
                            <td class="py-3 px-4">{{ $d->alasan_cuti }}</td>
                            <td class="py-3 px-4">{{ $d->lama_cuti }} {{ $d->ket_lama_cuti }}</td>
                            <td class="py-3 px-4">{{ $d->dari_tanggal }}</td>
                            <td class="py-3 px-4">{{ $d->sampai_dengan }}</td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-1 rounded {{ $d->status_cuti === 'Disetujui' ? 'bg-green-200 text-green-800' : ($d->status_cuti === 'Ditangguhkan' ? 'bg-orange-200 text-orange-800' : ($d->status_cuti === 'Perubahan' ? 'bg-blue-200 text-blue-800' : 'bg-red-200 text-red-800')) }}">
                                    {{ $d->status_cuti }}
                                </span>
                            </td>
                            <td class="py-3 px-4">{{ $d->ket_status_cuti ?? '-' }}</td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Detail Pegawai -->
@if(Auth::user()->role === 'admin' || Auth::user()->nip === '00')
    @foreach ($dataPeg as $user)
    <div id="pegawaidetail{{ $user->nip }}" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-xl mx-auto my-10">
            <div class="p-6">
                <h3 class="text-xl font-bold mb-4">Detail Cuti Pegawai - {{ $user->nama_pegawai }}</h3>
                <table class=" table-auto border-collapse">
                    <thead>
                        <tr class="bg-gray-100 text-gray-700 uppercase text-sm leading-normal">
                            <th class="py-2 px-4">No</th>
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
                    <tbody class="text-center">
                        @php
                            $cutiList = \App\Models\CutiPegawai::where('id_pegawai', $user->pegawai->id_pegawai)->get();
                        @endphp
                        @foreach ($cutiList as $cuti)
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-4">{{ $loop->iteration }}</td>
                            <td class="py-2 px-4">{{ $cuti->pegawai->nama_pegawai ?? '-' }}</td>
                            <td class="py-2 px-4">{{ $cuti->jenis_cuti }}</td>
                            <td class="py-2 px-4">{{ $cuti->alasan_cuti }}</td>
                            <td class="py-2 px-4">{{ $cuti->lama_cuti }} {{ $cuti->ket_lama_cuti }}</td>
                            <td class="py-2 px-4">{{ $cuti->dari_tanggal }}</td>
                            <td class="py-2 px-4">{{ $cuti->sampai_dengan }}</td>
                            <td class="whitespace-nowrap text-sm py-4 px-6 text-center">
                                <span class="px-3 py-1 rounded-md text-xs 
                                    {{ $cuti->status_cuti == 'Diajukan' || $cuti->status_cuti == 'Disetujui' ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }}">
                                    {{ $cuti->status_cuti }}
                                </span>
                            </td>
                            <td class="whitespace-nowrap text-sm py-4 px-6 text-center">
                                <span class="px-3 py-1 rounded-md text-xs bg-blue-200 text-blue-800">
                                    {{ $cuti->ket_status_cuti }}
                                </span>
                            </td>                        
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="bg-gray-50 px-6 py-3 flex justify-end">
                <button type="button" data-modal-hide="pegawaidetail{{ $user->nip }}" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-lg">
                    Tutup
                </button>
            </div>
        </div>
    </div>
    @endforeach
@endif

<!-- Footer -->
<div class="w-full bg-white rounded-lg shadow-md p-4">
    <div class="text-center py-4 text-gray-600">
        <h1><i class="fa fa-university text-4xl"></i></h1>
        <p class="py-2">Data Pegawai Pengadilan Negeri Purwokerto</p>
        <p>©{{ date('Y') }} Pengadilan Negeri Purwokerto.</p>
    </div>
</div>

@endsection
