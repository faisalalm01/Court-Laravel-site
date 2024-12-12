@extends('dashboard.index')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Approve Cuti Pegawai</h3>
        </div>

        <div class="title_right">
            <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Approve Cuti</a></li>
                </ol>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <form class="form-horizontal" name="cuti" action="#" method="POST">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3>Review Pengajuan Cuti</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Nama Pegawai</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control"
                                            value="{{ $data->pegawai->nama_pegawai }} " readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">NIP Pegawai</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" value="{{ $data->pegawai->nip }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Jabatan Pegawai</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control"
                                            value="{{ $data->pegawai->jabatan->nama_jabatan }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Golongan</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control"
                                            value="{{ $data->pegawai->golongan->nama_golongan }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Jenis Cuti</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" value="{{ $data->jenis_cuti }} "
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Alasan Cuti</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" value="{{ $data->alasan_cuti }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Durasi</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control"
                                            value="{{ $data->lama_cuti }} {{ $data->ket_lama_cuti }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Tanggal Mulai Cuti</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" value="{{ $data->dari_tanggal }} "
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Tanggal Akhir Cuti</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" value="{{ $data->sampai_dengan }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Status Pengajuan</label>
                                    <div class="col-sm-4">
                                        <input type="hidden" name="id_cutipegawai" value="{{ $data->id_cutipegawai }}<">
                                        <input type="text" class="form-control"
                                            value="{{ $data->status_cuti }} {{ $data->ket_status_cuti }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Aksi</label>
                                    <div class="col-sm-4">
                                        <select name="aksi" id="aksi" class="form-control" required>
                                            <option value="" selected disabled>---- Pilih Aksi ----</option>
                                            {{--
                                        // hapus mulai sini --}}
                                            <option value="Disetujui">Disetujui</option>
                                            <option value="Perubahan">Perubahan</option>
                                            <option value="Ditangguhkan">Ditangguhkan</option>
                                            <option value="Tidak Disetujui">Tidak Disetujui</option>

                                            {{-- end hapus --}}

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Keterangan</label>
                                    <div class="col-sm-4">
                                        <textarea name="reject" id="reject" class="form-control" placeholder="Masukkan Keterangan" rows="3"
                                            disabled></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
                            </div>
                        </div><!-- /.panel -->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
