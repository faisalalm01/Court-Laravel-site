@extends('dashboard.index')

@section('content')
    <div class="flex flex-col items-center bg-white mb-7 py-8 shadow-sm px-5">
        <div class="flex items-center justify-between w-full border bg-gray-400 px-4 py-2 rounded-md">
          <div class="w-12 h-12 bg-gray-300 flex items-center justify-center rounded-full shadow">
            <i class="fas fa-lock text-gray-700"></i>
          </div>
      
          <div class="relative flex items-center justify-center w-20 h-20 bg-white border-4 border-gray-300 rounded-full shadow-lg">
            <img src="https://st.depositphotos.com/1537427/3571/v/450/depositphotos_35717211-stock-illustration-vector-user-icon.jpg" alt="Profile" class="w-full h-full rounded-full object-cover" />
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
            <div class="x_panel">
                <div class="x_title">
                    <h2 class="text-xl">Daftar Pengajuan Cuti Anda<small>Daftar Menunggu approval cuti dari atasan</small></h2>
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
                    <table id="table-data" class="min-w-full table-auto border-collapse border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="p-3">No</th>
                                <th class="p-3">Nama</th>
                                <th class="p-3">Jenis Cuti</th>
                                <th class="p-3">Alasan Cuti</th>
                                <th class="p-3">Lama Cuti</th>
                                <th class="p-3">Dari Tanggal</th>
                                <th class="p-3">Sampai Dengan</th>
                                <th class="p-3">Status</th>
                                <th class="p-3">Keterangan</th>
                           </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td class="p-3">{{ $loop->iteration }}</td>
                                    <td class="p-3">{{ $d->pegawai->nama_pegawai }}</td>
                                    <td class="p-3">{{ $d->jenis_cuti }}</td>
                                    <td class="p-3">{{ $d->alasan_cuti }}</td>
                                    <td class="p-3">{{ $d->lama_cuti }} {{ $d->ket_lama_cuti }}</td>
                                    <td class="p-3">{{ $d->dari_tanggal }}</td>
                                    <td class="p-3">{{ $d->sampai_dengan }}</td>

                                    <td class="p-3 text-center">
                                        <a href="#" class="btn bg-green-500 text-white p-1 btn-xs "> {{ $d->status_cuti }}</a>
                                    </td>
                                    <td class="p-3 ext-center">
                                        <a href="#" class="btn bg-blue-500 text-white p-1 btn-xs ">
                                            {{ $d->ket_status_cuti }}</a>
                                    </td>
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
