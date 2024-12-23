@extends('main')

@section('main_content')
<div class="flex h-screen">
    <x-sidebar />
    <div class="w-full bg-gray-100">
        <x-navbar />
        <div class="p-6 bg-gray-100 mb-20">
            @yield('content')
            {{-- <div class="bg-white shadow-md rounded p-4">
                <h2 class="text-lg font-bold mb-4">Daftar Pengajuan Cuti Anda</h2>
                <table class="min-w-full table-auto border-collapse border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-300 px-4 py-2 text-left">No</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Nama</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Jenis Cuti</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Alasan Cuti</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Lama Cuti</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Dari Tanggal</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Sampai Dengan</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Status</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">1</td>
                            <td class="border border-gray-300 px-4 py-2">Eddy Daulata Sembiring, S.H, M.H</td>
                            <td class="border border-gray-300 px-4 py-2">Cuti Tahunan</td>
                            <td class="border border-gray-300 px-4 py-2">Sakit</td>
                            <td class="border border-gray-300 px-4 py-2">1 Hari</td>
                            <td class="border border-gray-300 px-4 py-2">2024-04-01</td>
                            <td class="border border-gray-300 px-4 py-2">2024-04-02</td>
                            <td class="border border-gray-300 px-4 py-2 text-green-600">Diajukan</td>
                            <td class="border border-gray-300 px-4 py-2">Menunggu Approval Panmud Permohonan</td>
                        </tr>
                    </tbody>
                </table>
            </div> --}}
        </div>
        <x-footer />
    </div>
</div>
 
@endsection