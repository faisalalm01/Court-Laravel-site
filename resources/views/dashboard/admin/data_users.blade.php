@extends('dashboard.index')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Data Users</h3>
        </div>

        <div class="title_right">
            <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Users</a></li>
                </ol>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <a href="#" title="Tambah User" class="btn btn-info pull-right" data-toggle="modal"
                data-target=".btn-tambah-user"><i class="fa fa-plus-circle"></i> Tambah User</a>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="x_panel">
                <div class="x_title">
                    <h2>Data User <small>User yang menggunakan aplikasi</small></h2>
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
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama Pegawai</th>
                                <th>Jabatan</th>
                                <th>Hak Akses</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->nip }}</td>
                                    <td>{{ $user->pegawai->nama_pegawai }}</td>
                                    <td>{{ $user->pegawai->jabatan->nama_jabatan }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-info" data-toggle="modal"
                                            data-target="#modalviewuser{{ $user->nip }}"><i class="fa fa-eye"></i>
                                            View</a>
                                        <a href="#" class="btn btn-primary" data-toggle="modal"
                                            data-target="#modaledituser{{ $user->nip }}"><i class="fa fa-edit"></i>
                                            Edit</a>
                                    </td>
                                </tr>


                                <div class="modal fade" id="modaledituser{{ $user->nip }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Form Edit User</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form
                                                    action="{{ route('dashboard.admin.edit-users', ['nip' => $user->nip]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label>Pegawai</label>
                                                        <select class="form-control" name="nip">
                                                            <option value="{{ $user->nip }}">
                                                                {{ $user->pegawai->nama_pegawai }}</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password" name="password" class="form-control"
                                                            placeholder="Masukkan Password">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Hak Akses</label>
                                                        <select class="form-control" name="role">
                                                            @if ($user->role === 'User')
                                                                <option value="User" selected>User</option>
                                                                <option value="Admin">Admin</option>
                                                            @endif

                                                            @if ($user->role === 'Admin')
                                                                <option value="User">User</option>
                                                                <option value="Admin" selected>Admin</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="modalviewuser{{ $user->nip }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">View User {{ $user->pegawai->nama_pegawai }}
                                                </h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h3 class="profile-username text-center">{{ $user->role }}
                                                </h3>
                                                <strong>Nama Lengkap</strong>
                                                <p class="text-muted">{{ $user->pegawai->nama_pegawai }}</p>
                                                <hr>
                                                <strong>NIP</strong>
                                                <p class="text-muted">{{ $user->nip }}</p>
                                                <hr>
                                                <strong>Jabatan</strong>
                                                <p class="text-muted">
                                                    {{ $user->pegawai->jabatan->nama_jabatan }}</p>
                                                <hr>
                                                <strong>Golongan</strong>
                                                <p class="text-muted">
                                                    {{ $user->pegawai->golongan->nama_golongan }}</p>
                                                <hr>
                                                <strong>Hak Akses Akun</strong>
                                                <p class="text-muted">{{ $user->role }}</p>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="modal fade btn-tambah-user" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span
                                            aria-hidden="true">×</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">Form Tambah User </h4>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('dashboard.admin.add-users') }}" data-parsley-validate
                                        class="form-horizontal form-label-left" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Pegawai</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select class="form-control" name="nip">
                                                    <option selected disabled>-- Pilih Pegawai--</option>
                                                    @foreach ($pegawai as $peg)
                                                        <option value="{{ $peg->nip }}">{{ $peg->nama_pegawai }}
                                                            |
                                                            {{ $peg->nip }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-7 col-xs-12" type="password"
                                                    name="password" placeholder="Masukkan Password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Hak Akses</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select class="form-control" name="role">
                                                    <option selected disabled>-- Pilih Hak Akses--</option>
                                                    <option value="User">User</option>
                                                    <option value="Admin">Admin</option>
                                                </select>
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
