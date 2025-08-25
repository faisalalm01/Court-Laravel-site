@extends('dashboard.index')

@section('content')
    <div class="p-3">
        <div class="flex justify-between items-center">
            <div class="title_left">
                <h3 class="text-2xl font-semibold">Semua Notifikasi ({{ Auth::user()->pegawai->nama_pegawai }})</h3>
            </div>
            <div class="title_right">
                <nav aria-label="breadcrumb">
                    <ol class="flex space-x-2 text-gray-600">
                        <li><a href="{{ route('dashboard') }}" class="hover:underline">Home</a> /</li>
                        <li class="text-gray-800 font-medium">Notifikasi</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="p-3">
        <div class="bg-white shadow rounded-lg p-4">
            <div class="mb-4">
                <h2 class="text-xl font-bold">Notifikasi</h2>
                <p class="text-sm text-gray-500">Semua notifikasi ({{ Auth::user()->pegawai->nama_pegawai }})</p>
            </div>

            <div class="overflow-x-auto">
                <table id="data-tables" class="min-w-full table-auto border-collapse">
                    <thead>
                        <tr class="bg-gray-100 text-gray-700 uppercase text-sm leading-normal">
                            <th class="p-3 border-b">No</th>
                            <th class="p-3 border-b">Notifikasi</th>
                            {{-- <th class="p-3 border-b">Status</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $notifikasi)
                            <tr class="hover:bg-gray-50">
                                <td class="p-3 border-b">{{ $loop->iteration }}</td>
                                <td class="p-3 border-b">{{ $notifikasi->pesan }}</td>
                                {{-- <td class="p-3 border-b">
                                    {{ $notifikasi->dibaca ? 'Sudah Dibaca' : 'Belum dibaca' }}
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
