@extends('dashboard.index')

@section('content')
    <divs class="p-3">
        <div class="d-flex justify-content-between align-items-center">
            <!-- Title Kiri -->
            <div class="title_right">
                <h3>Aproval Cuti</h3>
            </div>

            <!-- Breadcrumb Kanan -->
            <div class="title_right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb float-sm-right m-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Aproval Cuti</li>
                    </ol>
                </nav>
            </div>
        </div>
    </divs>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Daftar Approval Cuti <small>Cuti yang perlu persetujuan</small> </h2>
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
                    <table id="table-data" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Jabatan</th>
                                <th>Jenis Cuti</th>
                                <th>Alasan Cuti</th>
                                <th>Durasi Cuti</th>
                                <th>Dari Tanggal</th>
                                <th>Sampai Dengan</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($data as $cuti)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $cuti->pegawai->nama_pegawai }}</td>
                                    <td>{{ $cuti->pegawai->nip }}</td>
                                    <td>{{ $cuti->pegawai->jabatan->nama_jabatan }}</td>
                                    <td>{{ $cuti->jenis_cuti }}</td>
                                    <td>{{ $cuti->alasan_cuti }}</td>
                                    <td>{{ $cuti->lama_cuti }} {{ $cuti->ket_lama_cuti }}</td>
                                    <td>{{ $cuti->dari_tanggal }}</td>
                                    <td>{{ $cuti->sampai_dengan }}</td>
                                    <td>{{ $cuti->alamat }}</td>
                                    <td>{{ $cuti->status_cuti }}</td>
                                    <td>{{ $cuti->ket_status_cuti }}</td>
                                    <td>
                                        <a href="" class="btn btn-info" data-toggle="modal"
                                            data-target="#modalviewcuti{{ $cuti->id_cutipegawai }}">
                                            View
                                        </a>
                                        <a href="/dashboard/user/approve-update-cuti/{{ $cuti->id_cutipegawai }}"
                                            class="btn btn-success">Approve</a>
                                    </td>
                                </tr>

                                <div class="modal fade" id="modalviewcuti{{ $cuti->id_cutipegawai }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Detail Pengajuan Cuti Pegawai
                                                    {{ $cuti->pegawai->nama_pegawai }}</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <strong>Nama lengkap</strong>
                                                <p class="text-muted">{{ $cuti->pegawai->nama_pegawai }}</p>
                                                <hr>
                                                <strong>NIP</strong>
                                                <p class="text-muted">{{ $cuti->pegawai->nip }}</p>
                                                <hr>
                                                <strong>Jabatan</strong>
                                                <p class="text-muted">{{ $cuti->pegawai->jabatan->nama_jabatan }}</p>
                                                <hr>
                                                <strong>Golongan</strong>
                                                <p class="text-muted">{{ $cuti->pegawai->golongan->nama_golongan }}</p>
                                                <hr>
                                                <strong>Jenis pengajuan cuti</strong>
                                                <p class="text-muted">{{ $cuti->jenis_cuti }}</p>
                                                <hr>
                                                <strong>Alasan cuti</strong>
                                                <p class="text-muted">{{ $cuti->alasan_cuti }}</p>
                                                <hr>
                                                <strong>Durasi cuti selama</strong>
                                                <p class="text-muted">{{ $cuti->lama_cuti }} {{ $cuti->ket_lama_cuti }}
                                                </p>
                                                <hr>
                                                <strong>Tanggal mulai cuti</strong>
                                                <p class="text-muted">{{ $cuti->dari_tanggal }}</p>
                                                <hr>
                                                <strong>Tanggal akhir cuti</strong>
                                                <p class="text-muted">{{ $cuti->sampai_dengan }}</p>
                                                <hr>
                                                <strong>Alamat</strong>
                                                <p class="text-muted">{{ $cuti->alamat }}</p>
                                                <hr>
                                                <strong>Status</strong>
                                                <p class="text-muted">{{ $cuti->status_cuti }}
                                                    {{ $cuti->ket_status_cuti }}</p>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- end dump --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
