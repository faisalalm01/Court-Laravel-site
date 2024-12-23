@extends('dashboard.index')

@section('content')
<div class="mb-10">
    <div class="justify-between">
            <!-- Title Kiri -->
            <div class="title_left">
                <h3 class="text-2xl">Cuti</h3>
            </div>

            <!-- Breadcrumb Kanan -->
            <div class="title_right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb float-sm-right m-0">
                        <li class="breadcrumb-item"><a href="#">Home /</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cuti</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="">
        <div class="">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Daftar Cuti <small>Daftar cuti pegawai pengadilan Negeri Purwokerto</small></h2>
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
                            <tr>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jenis Cuti</th>
                                <th>Alasan Cuti</th>
                                <th>Lama Cuti</th>
                                <th>Dari Tanggal</th>
                                <th>Sampai Dengan</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                            </tr>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $d->pegawai->nama_pegawai }}</td>
                                    <td>{{ $d->jenis_cuti }}</td>
                                    <td>{{ $d->alasan_cuti }}</td>
                                    <td>{{ $d->lama_cuti }} {{ $d->ket_lama_cuti }}</td>
                                    <td>{{ $d->dari_tanggal }}</td>
                                    <td>{{ $d->sampai_dengan }}</td>
                                    <td class="text-center">
                                        <a href="#"
                                            class="btn <?php if ($d->status_cuti == 'Diajukan' || $d->status_cuti == 'Disetujui') {
                  ?>
                  btn-success
                  <?php
                } else {
                  ?>
                  btn-danger
                  <?php
                }
                 ?> btn-xs ">
                                            <?php echo $d->status_cuti; ?></a>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-primary btn-xs "> <?php echo $d->ket_status_cuti; ?></a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="modalviewcuti{{ $d->id_cutipegawai }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">View KNP Pegawai {{ $d->pegawai->nama_pegawai }}
                                                </h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <strong>Nama lengkap</strong>
                                                <p class="text-muted"> {{ $d->pegawai->nama_pegawai }}</p>
                                                <hr>
                                                <strong>NIP</strong>
                                                <p class="text-muted"> {{ $d->pegawai->nip }}</p>
                                                <hr>
                                                <strong>Jabatan</strong>
                                                <p class="text-muted"><?php echo $row['jabatan']; ?></p>
                                                <hr>
                                                <strong>Golongan</strong>
                                                <p class="text-muted"> {{ $d->pegawai->golongan->nama_golongan }}</p>
                                                <hr>
                                                <strong>Cuti tahunan</strong>
                                                <p class="text-muted"><?php echo $row['cuti_tahunan']; ?></p>
                                                <hr>
                                                <strong>Cuti sakit</strong>
                                                <p class="text-muted"><?php echo $row['cuti_sakit']; ?></p>
                                                <hr>
                                                <strong>Cuti bersalin</strong>
                                                <p class="text-muted"><?php echo $row['cuti_bersalin']; ?></p>
                                                <hr>
                                                <strong>Cuti bersalin anak ke-3</strong>
                                                <p class="text-muted"><?php echo $row['cuti_bersalin_anakketiga']; ?></p>
                                                <hr>
                                                <strong>Cuti musibah</strong>
                                                <p class="text-muted"><?php echo $row['cuti_musibah']; ?></p>
                                                <hr>
                                                <strong>Keterangan cuti musibah</strong>
                                                <p class="text-muted"><?php echo $row['ket_cuti_musibah']; ?></p>
                                                <hr>
                                                <strong>Cuti selain musibah</strong>
                                                <p class="text-muted"><?php echo $row['cuti_selain_musibah']; ?></p>
                                                <hr>
                                                <strong>Keterangan cuti selain musibah</strong>
                                                <p class="text-muted"><?php echo $row['ket_cuti_selain_musibah']; ?></p>
                                                <hr>
                                                <strong>Cuti besar</strong>
                                                <p class="text-muted"><?php echo $row['cuti_besar']; ?></p>
                                                <hr>
                                                <strong>Cuti diluar tanggungan negara</strong>
                                                <p class="text-muted"><?php echo $row['cuti_diluar_tanggungan_negara']; ?></p>
                                                <hr>
                                                <strong>Penetapan</strong>
                                                <p class="text-muted"><?php echo $row['tgl']; ?></p>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
