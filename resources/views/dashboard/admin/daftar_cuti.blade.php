@extends('dashboard.index')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Cuti</h3>
        </div>

        <div class="title_right">
            <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Cuti</a></li>
                </ol>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <a href="export_cuti.php" class="btn btn-success pull-right"><i class="fa fa-download"></i> Export Excel</a>
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
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
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
                                    <td>
                                        <?php
                  if ($d->status_cuti == 'Disetujui') {
                    ?>
                                        <a href="cetak_pdf.php?id=<?php echo $d->id_cutipegawai; ?>" class="btn btn-info"><i
                                                class="fa fa-print"></i> Print PDF</a>
                                        <?php
                  } else {
                    ?>
                                        <a href="cetak_pdf.php?id=<?php echo $d->id_cutipegawai; ?>" class="btn btn-info disabled"><i
                                                class="fa fa-print"></i> Print PDF</a>
                                        <?php
                  }

                 ?>
                                </tr>

                                <div class="modal fade" id="modaldeletecuti<?php echo $d->id_cutipegawai; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Hapus Cuti Pegawai <?php echo $d->pegawai->nama_pegawai; ?></h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="" action="delete_cuti.php" method="get">
                                                    <div class="form-group">
                                                        <label>Anda ingin menghapus Cuti <?php echo $d->pegawai->nama_pegawai; ?></label>
                                                        <input type="hidden" name="id_cuti" class="form-control"
                                                            value="<?php echo $d->pegawai->nama_pegawai; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary">Yes</button>
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal"s>No</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal fade" id="modaleditcuti<?php echo $d->id_cutipegawai; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Form Edit Cuti</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="" action="edit_cuti.php" method="get">
                                                    <div class="form-group">
                                                        <label>Pegawai</label>
                                                        <select class="form-control" name="pegawai">
                                                            <option value="<?php echo $d->pegawai->nip; ?>"> <?php echo $d->pegawai->nama_pegawai; ?>
                                                            </option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Cuti tahunan </label>
                                                        <div>
                                                            <input type="hidden" name="id_cuti"
                                                                value="<?php echo $d->id_cutipegawai; ?>">
                                                            <input class="form-control" type="text" name="ct_tahunan"
                                                                value="<?php echo $d['cuti_tahunan']; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Cuti sakit </label>
                                                        <div>
                                                            <input class="form-control" type="text" name="ct_sakit"
                                                                value="<?php echo $d['cuti_sakit']; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Cuti bersalin </label>
                                                        <div>
                                                            <input class="form-control" type="text" name="ct_bersalin"
                                                                value="<?php echo $d['cuti_bersalin']; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Cuti bersalin anak ketiga </label>
                                                        <div>
                                                            <input class="form-control" type="text"
                                                                name="ct_bersalin_anakketiga"
                                                                value="<?php echo $d['cuti_bersalin_anakketiga']; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Cuti musibah </label>
                                                        <div>
                                                            <input class="form-control" type="text" name="ct_musibah"
                                                                value="<?php echo $d['cuti_musibah']; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Keterangan cuti musibah </label>
                                                        <div>
                                                            <input class="form-control" type="text"
                                                                name="ket_ct_musibah" value="<?php echo $d['ket_cuti_musibah']; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Cuti selain musibah </label>
                                                        <div>
                                                            <input class="form-control" type="text"
                                                                name="ct_selain_musibah" value="<?php echo $d['cuti_selain_musibah']; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Keterangan cuti selain musibah </label>
                                                        <div>
                                                            <input class="form-control" type="text"
                                                                name="ket_ct_selain_musibah" value="<?php echo $d['ket_cuti_selain_musibah']; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Cuti besar </label>
                                                        <div>
                                                            <input class="form-control" type="text" name="ct_besar"
                                                                value="<?php echo $d['cuti_besar']; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Cuti diluar tanggungan negara </label>
                                                        <div>
                                                            <input class="form-control" type="text"
                                                                name="ct_diluar_tanggungan" value="<?php echo $d['cuti_diluar_tanggungan_negara']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="modalviewcuti<?php echo $d->id_cutipegawai; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">View KNP Pegawai <?php echo $d->pegawai->nama_pegawai; ?></h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <strong>Nama lengkap</strong>
                                                <p class="text-muted"><?php echo $d->pegawai->nama_pegawai; ?></p>
                                                <hr>
                                                <strong>NIP</strong>
                                                <p class="text-muted"><?php echo $d->pegawai->nip; ?></p>
                                                <hr>
                                                <strong>Jabatan</strong>
                                                <p class="text-muted"><?php echo $d->pegawai->jabatan->nama_jabatan; ?></p>
                                                <hr>
                                                <strong>Golongan</strong>
                                                <p class="text-muted"><?php echo $d->pegawai->golongan->nama_golongan; ?></p>
                                                <hr>
                                                <strong>Cuti tahunan</strong>
                                                <p class="text-muted"><?php echo $d['cuti_tahunan']; ?></p>
                                                <hr>
                                                <strong>Cuti sakit</strong>
                                                <p class="text-muted"><?php echo $d['cuti_sakit']; ?></p>
                                                <hr>
                                                <strong>Cuti bersalin</strong>
                                                <p class="text-muted"><?php echo $d['cuti_bersalin']; ?></p>
                                                <hr>
                                                <strong>Cuti bersalin anak ke-3</strong>
                                                <p class="text-muted"><?php echo $d['cuti_bersalin_anakketiga']; ?></p>
                                                <hr>
                                                <strong>Cuti musibah</strong>
                                                <p class="text-muted"><?php echo $d['cuti_musibah']; ?></p>
                                                <hr>
                                                <strong>Keterangan cuti musibah</strong>
                                                <p class="text-muted"><?php echo $d['ket_cuti_musibah']; ?></p>
                                                <hr>
                                                <strong>Cuti selain musibah</strong>
                                                <p class="text-muted"><?php echo $d['cuti_selain_musibah']; ?></p>
                                                <hr>
                                                <strong>Keterangan cuti selain musibah</strong>
                                                <p class="text-muted"><?php echo $d['ket_cuti_selain_musibah']; ?></p>
                                                <hr>
                                                <strong>Cuti besar</strong>
                                                <p class="text-muted"><?php echo $d['cuti_besar']; ?></p>
                                                <hr>
                                                <strong>Cuti diluar tanggungan negara</strong>
                                                <p class="text-muted"><?php echo $d['cuti_diluar_tanggungan_negara']; ?></p>
                                                <hr>
                                                <strong>Penetapan</strong>
                                                <p class="text-muted"><?php echo $d['tgl']; ?></p>
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
