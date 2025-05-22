@extends('dashboard.index')

@section('content')
    <!-- <div class="mb-10">
        <div class="justify-between">
            <div class="title_left">
                <h3 class="text-2xl">Cuti Disetujui</h3>
            </div>

            <div class="">
                <nav aria-label="">
                    <ol class="">
                        <li class=""><a href="">Home /</a></li>
                        <li class="active" aria-current="page">Cuti Disetujui</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div> -->
    <div class="p-3">
        <div class="flex justify-between items-center">
            <div class="title_left">
                <h3 class="text-2xl font-semibold">Cuti Disetujui</h3>
            </div>
            <div class="title_right">
                <nav aria-label="breadcrumb">
                    <ol class="flex space-x-2 text-gray-600">
                        <li><a href="#" class="hover:underline">Home</a> /</li>
                        <li class="text-gray-800 font-medium">Cuti Disetujui</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="">
        <div class="">
            <div class="x_panel">
                <div class="x_title">
                    <div class="mb-4">
                        <h2 class="text-xl font-bold">Daftar Cuti Disetujui</h2>
                    </div>
                    <!-- <h2>Daftar Cuti Disetujui </h2> -->
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
                    <table id="data-tables" class="min-w-full table-auto border-collapse border border-gray-200">
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
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $d->pegawai->nama_pegawai }}</td>
                                    <td>{{ $d->jenis_cuti }}</td>
                                    <td>{{ $d->alasan_cuti }}</td>
                                    <td>{{ $d->lama_cuti }} {{ $d->ket_lama_cuti }}
                                    </td>
                                    <td>{{ $d->dari_tanggal }}</td>
                                    <td> {{ $d->sampai_dengan }}</td>
                                    <td class="p-3 border-b">
                                        <span class="px-2 py-1 rounded bg-green-200 text-green-800">
                                            {{ $d->status_cuti }}
                                        </span>
                                    </td>
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
                                    <td>
                                        <a href="/dashboard/user/cetak-pdf/{{ $d->id_cutipegawai }}"
                                            class="btn btn-info"><i class="fa fa-print"></i>
                                            Print PDF</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
