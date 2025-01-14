@extends('dashboard.index')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>KGB</h3>
        </div>

        <div class="title_right">
            <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">KGB</a></li>
                </ol>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <a href="export_kgb.php" class="btn btn-success pull-right"><i class="fa fa-download"></i> Export Excel</a>
            <a href="#" class="btn btn-info pull-right" data-toggle="modal" data-target=".btn-tambah-kgb"><i
                    class="fa fa-plus-circle"></i> Tambah KGB</a>
            <div class="x_panel">
                <div class="x_title">
                    <h2>Daftar KGB <small>Kenaikan Gaji Berkala Pengadilan Negeri Purwokerto</small></h2>
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
                                <th>NIP</th>
                                <th>Jabatan</th>
                                <th>Golongan</th>
                                <th>KGB terakhir</th>
                                <th>KGB yang akan datang</th>
                                <th>Keterangan</th>
                                <th>Penetapan</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $d->pegawai->nama_pegawai }}</td>
                                    <td>{{ $d->pegawai->nip }}</td>
                                    <td>{{ $d->pegawai->jabatan->nama_jabatan }}</td>
                                    <td>{{ $d->pegawai->golongan->nama_golongan }}</td>
                                    <td>{{ $d->kgb_terakhir }} </td>
                                    <td>{{ $d->kgb_datang }}</td>
                                    <td>{{ $d->keterangan }}</td>
                                    <td><?php echo $d->timestamp; ?></td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-info" data-toggle="modal"
                                            data-target="#modalviewkgb<?php echo $d->id_kgbpegawai; ?>"><i class="fa fa-eye"></i>
                                            View</a>
                                        <a href="#" class="btn btn-primary" data-toggle="modal"
                                            data-target="#modaleditkgb<?php echo $d->id_kgbpegawai; ?>"><i class="fa fa-edit"></i>
                                            Edit</a>
                                        <a href="#" class="btn btn-danger" data-toggle="modal"
                                            data-target="#modaldeletekgb<?php echo $d->id_kgbpegawai; ?>"><i class="fa fa-trash"></i>
                                            Delete</a>
                                    </td>
                                </tr>

                                <div class="modal fade" id="modaldeletekgb<?php echo $d->id_kgbpegawai; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Hapus KGB Pegawai <?php echo $d->pegawai->nama_pegawai; ?></h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="" action="delete_kgb.php" method="get">
                                                    <div class="form-group">
                                                        <label>Anda ingin menghapus KGB <?php echo $d->pegawai->nama_pegawai; ?></label>
                                                        <input type="hidden" name="id_kgb" class="form-control"
                                                            value="<?php echo $d->id_kgbpegawai; ?>">
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


                                <div class="modal fade" id="modaleditkgb<?php echo $d->id_kgbpegawai; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Form Edit KNP</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="" action="edit_kgb.php" method="get">
                                                    <div class="form-group">
                                                        <label>Pegawai</label>
                                                        <select class="form-control" name="pegawai">
                                                            <option value="<?php echo $d->pegawai->nip; ?>"> <?php echo $d->pegawai->nama_pegawai; ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>KNP terakhir</label>
                                                        <input type="hidden" name="id_kgb"
                                                            value="<?php echo $d->id_kgbpegawai; ?>">
                                                        <input type="date" name="kgb_terakhir" class="form-control"
                                                            value="<?php echo $d->kgb_terakhir; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>KNP yang akan datang</label>
                                                        <input type="date" name="kgb_datang" class="form-control"
                                                            value="<?php echo $d->kgb_datang; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Keterangan</label>
                                                        <input type="text" class="form-control" name="keterangan"
                                                            value="<?php echo $d->keterangan; ?>">
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

                                <div class="modal fade" id="modalviewkgb<?php echo $d->id_kgbpegawai; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">View KNP Pegawai <?php echo $d->nama_pegawai; ?></h4>
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
                                                <strong>KGB terakhir</strong>
                                                <p class="text-muted"><?php echo $d->kgb_terakhir; ?></p>
                                                <hr>
                                                <strong>KGB yang akan datang</strong>
                                                <p class="text-muted"><?php echo $d->kgb_datang; ?></p>
                                                <hr>
                                                <strong>Keterangan</strong>
                                                <p class="text-muted"><?php echo $d->keterangan; ?></p>
                                                <hr>
                                                <strong>Diubah pada</strong>
                                                <p class="text-muted"><?php echo $d->timestamp; ?></p>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="modal fade btn-tambah-kgb" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span
                                            aria-hidden="true">×</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">Form Tambah KGB </h4>
                                </div>
                                <div class="modal-body">
                                    <form data-parsley-validate class="form-horizontal form-label-left" method="POST">

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Pegawai</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select class="form-control" name="pegawai">
                                                    <option selected disabled>-- Pilih Pegawai--</option>
                                                    @foreach ($pegawai as $pegawai)
                                                        <option value="{{ $pegawai->id_pegawai }}">
                                                            {{ $pegawai->nama_pegawai }} |
                                                            {{ $pegawai->nip }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">KGB Terakhir</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-7 col-xs-12" type="date"
                                                    name="kgb_terakhir" value="">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">KGB yang akan datang
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-7 col-xs-12" type="date"
                                                    name="kgb_datang" value="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-7 col-xs-12" type="text"
                                                    name="keterangan" placeholder="Masukkan Keterangan">
                                            </div>
                                        </div>

                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button type="submit" class="btn btn-primary"
                                                    name="submit">Submit</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
