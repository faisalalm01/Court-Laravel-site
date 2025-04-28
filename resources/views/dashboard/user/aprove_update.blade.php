@extends('dashboard.index')

@section('content')
    <div class="p-3">
        <div class="d-flex justify-between items-center">
            <!-- Title Kiri -->
            <div class="title_left">
                <h3 class="text-2xl font-semibold">Approval Cuti</h3>
            </div>

            <!-- Breadcrumb Kanan -->
            <div class="title_right">
                <nav aria-label="breadcrumb">
                    <ol class="flex space-x-2 text-gray-600">
                        <li><a href="#" class="hover:underline">Home</a> /</li>
                        <li><a href="/dashboard/user/daftar-approval" class="hover:underline">Daftar Approval</a> /</li>
                        <li class="text-gray-800 font-medium">Approval Cuti</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="p-3">
        <div class="bg-white shadow rounded-lg p-6">
            <div class="mb-6">
                <h2 class="text-xl font-bold">Form Approval Cuti</h2>
                <p class="text-sm text-gray-500">Periksa dan approve cuti pegawai.</p>
            </div>

            <form action="{{ route('approval-cuti.update', $data->id_cutipegawai) }}" method="POST">
                @csrf
                @method('POST')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Nama Pegawai</label>
                        <input type="text" class="form-control" value="{{ $data->pegawai->nama_pegawai }}" readonly>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Jenis Cuti</label>
                        <input type="text" class="form-control" value="{{ $data->jenis_cuti }}" readonly>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Lama Cuti</label>
                        <input type="text" class="form-control" value="{{ $data->lama_cuti }} {{ $data->ket_lama_cuti }}"
                            readonly>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Dari Tanggal</label>
                        <input type="text" class="form-control" value="{{ $data->dari_tanggal }}" readonly>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Sampai Dengan</label>
                        <input type="text" class="form-control" value="{{ $data->sampai_dengan }}" readonly>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Alamat Selama Cuti</label>
                        <textarea class="form-control" rows="3" readonly>{{ $data->alamat }}</textarea>
                    </div>
                </div>

                <div class="mt-6">
                    <label class="block text-gray-700 font-semibold mb-2">Status Approval</label>
                    <select name="status_cuti" class="form-control" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="Disetujui">Disetujui</option>
                        <option value="Ditolak">Ditolak</option>
                    </select>
                </div>

                <div class="mt-6">
                    <label class="block text-gray-700 font-semibold mb-2">Catatan (Opsional)</label>
                    <textarea name="catatan" class="form-control" rows="4" placeholder="Tulis alasan jika menolak (opsional)"></textarea>
                </div>

                <div class="flex space-x-4 mt-8">
                    <button type="submit" class="btn btn-success">
                        Simpan Approval
                    </button>
                    <a href="/dashboard/user/daftar-approval" class="btn btn-secondary">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
