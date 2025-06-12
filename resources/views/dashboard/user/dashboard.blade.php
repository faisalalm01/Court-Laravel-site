@extends('dashboard.index')

@section('content')
    <div class="flex flex-col items-center rounded-lg bg-white mb-7 py-8 shadow-sm px-5">
        <div class="flex items-center justify-between w-full border bg-gray-400 px-4 py-2 rounded-md">
            <div class="w-12 h-12 bg-gray-300 flex items-center justify-center rounded-full shadow">
                <i class="fas fa-lock text-gray-700"></i>
            </div>

            <div class="relative flex items-center justify-center w-20 h-20 bg-white border-4 border-gray-300 rounded-full shadow-lg">
                <img src="https://st.depositphotos.com/1537427/3571/v/450/depositphotos_35717211-stock-illustration-vector-user-icon.jpg"
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


    <!-- Admin Section (Conditional) -->
    @if(Auth::user()->role === 'admin' || Auth::user()->nip === '00')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <!-- Users Card -->
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
        <!-- Employees Card -->
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


    <div class="w-full">
        <div class="">
            <div class="x_panel rounded-lg shadow-md mb-20">
                <div class="x_title">
                    @if(Auth::user()->role === 'admin' || Auth::user()->nip === '00')
                        <h2 class="text-xl">Data Pegawai<small>Daftar pegawai pengadilan Negeri Purwokerto</small>
                    @else
                        <h2 class="text-xl">Daftar Pengajuan Cuti Anda<small>Daftar Menunggu approval cuti dari atasan</small>
                    @endif
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

            @if(Auth::user()->role === 'admin' || Auth::user()->nip === '00')
                <div class="x_content">
                    <table id="data-tables" class="table-auto w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="py-2 px-4">No</th>
                                <th class="py-2 px-4">Nama</th>
                                <th class="py-2 px-4">NIP</th>
                                <th class="py-2 px-4">Jabatan</th>
                                <th class="py-2 px-4">Golongan</th>
                                <th class="py-2 px-4">Cuti</th>
                                <th class="py-2 px-4">KNP</th>
                                <th class="py-2 px-4">KGB</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataPeg as $user)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-4">{{ $loop->iteration }}</td>
                                    <td class="py-3 px-4">{{ $user->nama_pegawai }}</td>
                                    <td class="py-3 px-4">{{ $user->nip }}</td>
                                    <td class="py-3 px-4">{{ $user->jabatan->nama_jabatan }}</td>
                                    <td class="py-3 px-4">{{ $user->golongan->nama_golongan }}</td>
                                    <td class="py-3 px-4">
                                        <a href="#" class="bg-green-500 rounded-md px-2 py-1 text-xs text-white" data-toggle="modal"
                                        data-modal-toggle="">
                                        lihat detail</a>
                                    </td>
                                    <td class="py-3 px-4">
                                        <a href="#" class="bg-green-500 rounded-md px-2 py-1 text-xs text-white" data-toggle="modal"
                                        data-modal-toggle="">
                                        lihat detail</a>
                                    </td>
                                    <td class="py-3 px-4">
                                        <a href="#" class="bg-green-500 rounded-md px-2 py-1 text-xs text-white" data-toggle="modal"
                                        data-modal-toggle="">
                                        lihat detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="x_content">
                    <table id="data-tables" class="table-auto w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="py-2 px-4">No</th>
                                <th class="py-2 px-4">Nama</th>
                                <th class="py-2 px-4">Jenis Cuti</th>
                                <th class="py-2 px-4">Alasan Cuti</th>
                                <th class="py-2 px-4">Lama Cuti</th>
                                <th class="py-2 px-4">Dari Tanggal</th>
                                <th class="py-2 px-4">Sampai Dengan</th>
                                <th class="py-2 px-4">Status</th>
                                <th class="py-2 px-4">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-4">{{ $loop->iteration }}</td>
                                    <td class="py-3 px-4">{{ $d->pegawai->nama_pegawai }}</td>
                                    <td class="py-3 px-4">{{ $d->jenis_cuti }}</td>
                                    <td class="py-3 px-4">{{ $d->alasan_cuti }}</td>
                                    <td class="py-3 px-4">{{ $d->lama_cuti }} {{ $d->ket_lama_cuti }}</td>
                                    <td class="py-3 px-4">{{ $d->dari_tanggal }}</td>
                                    <td class="py-3 px-4">{{ $d->sampai_dengan }}</td>
                                    @if ($d->status_cuti === 'Disetujui')
                                        <td class="py-3 px-4">
                                            <span class="px-2 py-1 rounded bg-green-200 text-green-800">
                                                {{ $d->status_cuti }}
                                            </span>
                                        </td>
                                    @elseif ($d->status_cuti === 'Ditangguhkan')
                                        <td class="py-3 px-4">
                                            <span class="px-2 py-1 rounded bg-orange-200 text-orange-800">
                                                {{ $d->status_cuti }}
                                            </span>
                                        </td>
                                    @elseif ($d->status_cuti === 'Perubahan')
                                        <td class="py-3 px-4">
                                            <span class="px-2 py-1 rounded bg-blue-200 text-blue-800">
                                                {{ $d->status_cuti }}
                                            </span>
                                        </td>
                                    @else
                                        <td class="py-3 px-4">
                                            <span class="px-2 py-1 rounded bg-red-200 text-red-800">
                                                {{ $d->status_cuti }}
                                            </span>
                                        </td>
                                    @endif
                                    <td class="py-3 px-4">
                                        <span class="px-2 py-1 rounded text-black bg-blue-200">
                                            {{ $d->ket_status_cuti ?? '-' }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            </div>
        </div>
    </div>
    <div>
        <div class="w-full">
            <div class="x_panel">
                <div class="x_content text-center py-4">
                    <h1><i class="fa fa-university text-4xl text-gray-600"></i> </h1>
                    <p class="py-2 text-gray-700">Data Pegawai Pengadilan Negeri Purwokerto</p>
                    <p class="text-gray-500">©{{ date('Y') }} Pengadilan Negeri Purwokerto.</p>
                </div>
            </div>
        </div>
    </div>
@endsection