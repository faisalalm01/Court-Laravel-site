@extends('dashboard.index')

@section('content')
    <div class="flex flex-col items-center rounded-lg bg-white mb-7 py-8 shadow-sm px-5">
        <div class="flex items-center justify-between w-full border bg-gray-400 px-4 py-2 rounded-md">
            <div class="w-12 h-12 bg-gray-300 flex items-center justify-center rounded-full shadow">
                <i class="fas fa-lock text-gray-700"></i>
            </div>

            <div
                class="relative flex items-center justify-center w-20 h-20 bg-white border-4 border-gray-300 rounded-full shadow-lg">
                <img src="https://st.depositphotos.com/1537427/3571/v/450/depositphotos_35717211-stock-illustration-vector-user-icon.jpg"
                    alt="Profile" class="w-full h-full rounded-full object-cover" />
            </div>

            <div class="w-12 h-12 bg-gray-300 flex items-center justify-center rounded-full shadow">
                <i class="fas fa-lock text-gray-700"></i>
            </div>
        </div>

        <div class="mt-4 text-center">
            <p class="text-2xl text-gray-600 font-semibold">Selamat Datang</p>
            <p class="text-2xl text-gray-800 font-bold">{{ Auth::user()->pegawai->nama_pegawai }}</p>
        </div>
    </div>

    <div class="w-full">
        <div class="">
            <div class="x_panel rounded-lg shadow-md mb-20">
                <div class="x_title">
                    <h2 class="text-xl">Daftar Pengajuan Cuti Anda<small>Daftar Menunggu approval cuti dari atasan</small>
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
                <div class="x_content">
                    <table id="data-tables" class="table-auto">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="">No</th>
                                <th class="">Nama</th>
                                <th class="">Jenis Cuti</th>
                                <th class="">Alasan Cuti</th>
                                <th class="">Lama Cuti</th>
                                <th class="">Dari Tanggal</th>
                                <th class="">Sampai Dengan</th>
                                <th class="">Status</th>
                                <th class="">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td class="">{{ $loop->iteration }}</td>
                                    <td class="">{{ $d->pegawai->nama_pegawai }}</td>
                                    <td class="">{{ $d->jenis_cuti }}</td>
                                    <td class="">{{ $d->alasan_cuti }}</td>
                                    <td class="">{{ $d->lama_cuti }} {{ $d->ket_lama_cuti }}</td>
                                    <td class="">{{ $d->dari_tanggal }}</td>
                                    <td class="">{{ $d->sampai_dengan }}</td>
                                    @if ($d->status_cuti === 'Disetujui')
                                        <td class="p-3 border-b">
                                            <span class="px-2 py-1 rounded bg-green-200 text-green-800">
                                                {{ $d->status_cuti }}
                                            </span>
                                        </td>
                                    @elseif ($d->status_cuti === 'Ditangguhkan')
                                        <td class="p-3 border-b">
                                            <span class="px-2 py-1 rounded bg-orange-200 text-orange-800">
                                                {{ $d->status_cuti }}
                                            </span>
                                        </td>
                                    @elseif ($d->status_cuti === 'Perubahan')
                                        <td class="p-3 border-b">
                                            <span class="px-2 py-1 rounded bg-blue-200 text-blue-800">
                                                {{ $d->status_cuti }}
                                            </span>
                                        </td>
                                    @else
                                        <td class="p-3 border-b">
                                            <span class="px-2 py-1 rounded bg-red-200 text-red-800">
                                                {{ $d->status_cuti }}
                                            </span>
                                        </td>
                                    @endif
                                    @if ($d->ket_status_cuti)
                                        <td class="p-3 border-b">
                                            <span class="px-2 py-1 rounded  text-black">
                                                {{ $d->ket_status_cuti }}
                                            </span>
                                        </td>
                                    @else
                                        <td class="p-3 border-b">
                                            <span class="px-2 py-1 rounded  text-black">
                                                -
                                            </span>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="w-full">
            <div class="x_panel">
                <div class="x_content text-center">
                    <h1><i class="fa fa-university text-4xl"></i> </h1>
                    <p class="py-2">Data Pegawai Pengadilan Negeri Purwokerto</p>
                    <p>©<?= date('Y') ?> Pengadilan Negeri Purwokerto.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
