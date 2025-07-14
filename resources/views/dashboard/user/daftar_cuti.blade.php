@extends('dashboard.index')

@section('content')
<div class="p-3">
    <div class="flex justify-between items-center">
        <div class="title_left">
            <h3 class="text-2xl font-semibold">Cuti</h3>
        </div>
        <div class="title_right">
            <nav aria-label="breadcrumb">
                <ol class="flex space-x-2 text-gray-600">
                    <li><a href="#" class="hover:underline">Home</a> /</li>
                    <li class="text-gray-800 font-medium">Cuti</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="p-3">
    <div class="bg-white shadow rounded-lg p-4">
        <div class="flex justify-between items-center mb-4">
            <div>
                <h2 class="text-xl font-bold">
                    Daftar Cuti 
                    @if($tahunDipilih === 'all')
                        (Semua Tahun)
                    @else
                        Tahun {{ $tahunDipilih }}
                    @endif
                </h2>
                <p class="text-sm text-gray-500">Daftar cuti pegawai Pengadilan Negeri Purwokerto</p>
            </div>
            <!-- Filter dropdown tahun -->
            <form method="GET" action="{{ route('dashboard.user.daftar-cuti') }}">
                <select name="tahun" onchange="this.form.submit()" class="rounded border-gray-300 px-3 py-2 text-sm">
                    <option value="all" {{ $tahunDipilih === 'all' ? 'selected' : '' }}>Semua Tahun</option>
                    @foreach ($tahunList as $tahun)
                        <option value="{{ $tahun }}" {{ $tahun == $tahunDipilih ? 'selected' : '' }}>
                            Tahun {{ $tahun }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <div class="overflow-x-auto">
            <table id="data-tables" class="min-w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-gray-700 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">No</th>
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
                <tbody>
                    @forelse ($data as $d)
                        <tr class="hover:bg-gray-50 border-b border-gray-200">
                            <td class="whitespace-nowrap text-sm py-4 px-6">{{ $loop->iteration }}</td>
                            <td class="whitespace-nowrap text-sm py-4 px-6">{{ $d->pegawai->nama_pegawai }}</td>
                            <td class="whitespace-nowrap text-sm py-4 px-6">{{ $d->jenis_cuti }}</td>
                            <td class="whitespace-nowrap text-sm py-4 px-6">{{ $d->alasan_cuti }}</td>
                            <td class="whitespace-nowrap text-sm py-4 px-6">{{ $d->lama_cuti }} {{ $d->ket_lama_cuti }}</td>
                            <td class="whitespace-nowrap text-sm py-4 px-6">{{ $d->dari_tanggal }}</td>
                            <td class="whitespace-nowrap text-sm py-4 px-6">{{ $d->sampai_dengan }}</td>
                            <td class="whitespace-nowrap text-sm py-4 px-6 text-center">
                                <span class="px-3 py-1 rounded-md text-xs 
                                    {{ $d->status_cuti == 'Diajukan' || $d->status_cuti == 'Disetujui' ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }}">
                                    {{ $d->status_cuti }}
                                </span>
                            </td>
                            <td class="whitespace-nowrap text-sm py-4 px-6 text-center">
                                <span class="px-3 py-1 rounded-md text-xs bg-blue-200 text-blue-800 block mb-1">
                                    {{ $d->ket_status_cuti }}
                                </span>
                                <span class="text-xs text-gray-600 block">
                                    Dipakai: {{ $d->lama_cuti }} {{ $d->ket_lama_cuti }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center py-4 text-sm text-gray-500">Tidak ada data cuti ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
