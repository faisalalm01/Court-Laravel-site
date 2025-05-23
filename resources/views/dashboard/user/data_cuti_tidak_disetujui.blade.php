@extends('dashboard.index')

@section('content')
    <div class="p-3">
        <div class="flex justify-between items-center">
            <div class="title_left">
                <h3 class="text-2xl font-semibold">Cuti Tidak Disetujui</h3>
            </div>
            <div class="title_right">
                <nav aria-label="breadcrumb">
                    <ol class="flex space-x-2 text-gray-600">
                        <li><a href="#" class="hover:underline">Home</a> /</li>
                        <li class="text-gray-800 font-medium">Cuti Tidak Disetujui</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

<disv class="p-3">
    <div class="bg-white shadow rounded-lg p-4">
        <div class="flex justify-between items-center mb-4">
            <div>
                <h2 class="text-xl font-bold">Daftar Cuti Tidak Disetujui</h2>
            </div>
        </div>
            <div class="overflow-x-auto">
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
                                    <td class="p-3 border-b">
                                        <span class="px-2 py-1 rounded bg-red-200 text-red-800">
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
