@extends('dashboard.index')

@section('content')
<div class="mb-10">
    <div class="justify-between">
            <!-- Title Kiri -->
            <div class="title_left">
                <h3 class="text-2xl">Cuti Perubahan</h3>
            </div>

            <!-- Breadcrumb Kanan -->
            <div class="">
                <nav aria-label="">
                    <ol class="">
                        <li class=""><a href="#">Home /</a></li>
                        <li class="active" aria-current="page">Cuti Perubahan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="">
        <div class="">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Daftar Cuti Perubahan </h2>
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
                                    <td> {{ $d->dari_tanggal }}</td>
                                    <td>{{ $d->sampai_dengan }}</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-primary btn-xs "> {{ $d->status_cuti }}
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-primary btn-xs "> {{ $d->ket_status_cuti }}</a>
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
