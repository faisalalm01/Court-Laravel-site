@extends('dashboard.index')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Jabatan</h3>
        </div>

        <div class="title_right">
            <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Jabatan</a></li>
                </ol>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <a href="#" class="btn btn-info pull-right" data-toggle="modal" data-target=".btn-tambah-jabatan"><i
                    class="fa fa-plus-circle"></i> Tambah Jabatan</a>
            <div class="x_panel">
                <div class="x_title">
                    <h2>Data Jabatan <small>Data jabatan pegawai Pengadilan Negeri Purwokerto</small></h2>
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
                    <table id="datatable" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width:5%">No</th>
                                <th>Nama Jabatan</th>
                                <th class="text-center" style="width:20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($jabatan as $j)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $j->nama_jabatan }}</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-info" data-toggle="modal"
                                            data-target="#modalviewjabatan{{ $j->id_jabatan }}"><i class="fa fa-eye"></i>
                                            View</a>
                                        <a href="#" class="btn btn-primary" data-toggle="modal"
                                            data-target="#modaleditjabatan{{ $j->id_jabatan }}"><i class="fa fa-edit"></i>
                                            Edit</a>
                                    </td>
                                </tr>

                                <div class="modal fade" id="modaleditjabatan{{ $j->id_jabatan }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Form Edit Jabatan</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="" action="edit_jabatan.php" method="get">
                                                    <div class="form-group">
                                                        <label>Nama Jabatan</label>
                                                        <input type="hidden" name="id_jabatan"
                                                            value="{{ $j->id_jabatan }}">
                                                        <input type="text" name="nama_jabatan" class="form-control"
                                                            value="{{ $j->nama_jabatan }}">
                                                    </div>
                                                    <hr>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="modalviewjabatan{{ $j->id_jabatan }}>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Nama jabatan :{{ $j->nama_jabatan }}</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="modal fade btn-tambah-jabatan" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span
                                            aria-hidden="true">×</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">Form Tambah Jabatan </h4>
                                </div>
                                <div class="modal-body">
                                    <form data-parsley-validate class="form-horizontal form-label-left" method="POST">

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Jabatan</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-7 col-xs-12" type="text"
                                                    name="namajabatan" placeholder="Masukkan nama jabatan">
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
