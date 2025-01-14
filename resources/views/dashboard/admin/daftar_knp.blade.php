@extends('dashboard.index')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>KNP</h3>
            <h2>Syarat-syarat Kenaikan Pangkat Reguler :</h2>
            <h2><small>*Salinan/Fotocopy yang disahkan dari SK CPNS</small></h2>
            <h2><small>*Salinan/Fotocopy yang disahkan dari SK PNS</small></h2>
            <h2><small>*Salinan/Fotocopy yang disahkan dari SK Pangkat terakhir</small></h2>
            <h2><small>*Salinan/Fotocopy yang disahkan dari SKP dalam 2(dua) tahun terakhir</small></h2>
            <h2><small>*Salinan/Fotocopy yang disahkan dari Karpeg/small></h2>
            <h2><small>*Nota Persetujuan BKN</small></h2>
            <h2>Pengajuan Usul Kenaikan Pangkat :</h2>
            <h2><small>- Ketua Pengadilan Tingkat Pertama mengajukan usul kenaikan pangkat bagi pegawai teknis diinstansinya
                    masing-masing kepada Ketua Pengadilan Tingkat Banding, untuk diteruskan ke Ditjen terkait.</small></h2>
            <h2><small>- Ketua Pengadilan Tingkat Banding mengajukan usul kenaikan pangkat bagi pegawai teknis di
                    instansinya masing-masing kepada Ditjen terkait.</small></h2>
        </div>

        <div class="title_right">
            <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">KNP</a></li>
                </ol>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <a href="export_knp.php" class="btn btn-success pull-right"><i class="fa fa-download"></i> Export Excel</a>
            <a href="#" class="btn btn-info pull-right" data-toggle="modal" data-target=".btn-tambah-knp"><i
                    class="fa fa-plus-circle"></i> Tambah KNP</a>
            <div class="x_panel">
                <div class="x_title">
                    <h2>Daftar KNP <small>Kenaikan Pangkat Pegawai Pengadilan Negeri Purwokerto</small></h2>
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
                                <th>KNP terakhir</th>
                                <th>KNP yang akan datang</th>
                                <th>Keterangan</th>
                                <th>Pensiun</th>
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
                                    <td>{{ $d->knp_terakhir }} </td>
                                    <td>{{ $d->knp_datang }}</td>
                                    <td>{{ $d->keterangan }}</td>
                                    <td>{{ $d->pensiun }}</td>
                                    <td>{{ $d->timestamp }}</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-info" data-toggle="modal"
                                            data-target="#modalviewknp<?php echo $d->id_knppegawai; ?>"><i class="fa fa-eye"></i>
                                            View</a>
                                        <a href="#" class="btn btn-primary" data-toggle="modal"
                                            data-target="#modaleditknp<?php echo $d->id_knppegawai; ?>"><i class="fa fa-edit"></i>
                                            Edit</a>
                                        <a href="#" class="btn btn-danger" data-toggle="modal"
                                            data-target="#modaldeleteknp<?php echo $d->id_knppegawai; ?>"><i class="fa fa-trash"></i>
                                            Delete</a>
                                    </td>
                                </tr>

                                <div class="modal fade" id="modaldeleteknp<?php echo $d->id_knppegawai; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Hapus KNP Pegawai <?php echo $d->pegawai->nama_pegawai; ?></h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="" action="delete_knp.php" method="get">
                                                    <div class="form-group">
                                                        <label>Anda ingin menghapus KNP <?php echo $d->pegawai->nama_pegawai; ?></label>
                                                        <input type="hidden" name="id_knp" class="form-control"
                                                            value="<?php echo $d->id_knppegawai; ?>">
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

                                <div class="modal fade" id="modaleditknp<?php echo $d->id_knppegawai; ?>">
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
                                                <form class="" action="edit_knp.php" method="get">
                                                    <div class="form-group">
                                                        <label>Pegawai</label>
                                                        <select class="form-control" name="pegawai">
                                                            <option value="<?php echo $d->pegawai->nip; ?>"> <?php echo $d->pegawai->nama_pegawai; ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>KNP terakhir</label>
                                                        <input type="hidden" name="id_knp"
                                                            value="<?php echo $d->id_knppegawai; ?>">
                                                        <input type="date" name="knp_terakhir" class="form-control"
                                                            value="<?php echo $d->knp_terakhir; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>KNP yang akan datang</label>
                                                        <input type="date" name="knp_datang" class="form-control"
                                                            value="<?php echo $d->knp_datang; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Keterangan</label>
                                                        <select class="form-control" name="golongan">
                                                            <option selected disabled>-- Pilih Golongan--</option>
                                                            @foreach ($golongan as $gol)
                                                                <option value="{{ $gol->nama_golongan }}">
                                                                    {{ $gol->nama_golongan }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Pensiun</label>
                                                        <input type="date" name="pensiun" class="form-control"
                                                            value="<?php echo $d->pensiun; ?>">
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

                                <div class="modal fade" id="modalviewknp<?php echo $d->id_knppegawai; ?>">
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
                                                <strong>KNP terakhir</strong>
                                                <p class="text-muted"><?php echo $d->knp_terakhir; ?></p>
                                                <hr>
                                                <strong>KNP yang akan datang</strong>
                                                <p class="text-muted"><?php echo $d->knp_datang; ?></p>
                                                <hr>
                                                <strong>Keterangan</strong>
                                                <p class="text-muted"><?php echo $d->keterangan; ?></p>
                                                <hr>
                                                <strong>Pensiun</strong>
                                                <p class="text-muted"><?php echo $d->pensiun; ?></p>
                                                <hr>
                                                <strong>Diubah pada</strong>
                                                <p class="text-muted"><?php echo $d->timestamp; ?></p>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                ?>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="modal fade btn-tambah-knp" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span
                                            aria-hidden="true">×</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">Form Tambah KNP </h4>
                                </div>
                                <div class="modal-body">
                                    <form data-parsley-validate class="form-horizontal form-label-left" method="POST">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Pegawai</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select class="form-control" name="pegawai">
                                                    <option selected disabled>-- Pilih Pegawai--</option>
                                                    @foreach ($pegawai as $pegawai)
                                                        <option value="<?php echo $d->id_pegawai; ?>"><?php echo $d->nama_pegawai; ?> |
                                                            <?php echo $d->nip; ?></option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">KNP Terakhir</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-7 col-xs-12" type="date"
                                                    name="knp_terakhir" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">KNP yang akan datang
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-7 col-xs-12" type="date"
                                                    name="knp_datang" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select class="form-control" name="golongan">
                                                    <option selected disabled>-- Pilih Golongan--</option>
                                                    @foreach ($golongan as $gol)
                                                        <option value="<?php echo $gol->nama_golongan; ?>"><?php echo $gol->nama_golongan; ?></option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Pensiun</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-7 col-xs-12" type="date"
                                                    name="pensiun" value="">
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
