@extends('dashboard.index')

@section('content')
        <div class="p-3">
            <div class="d-flex justify-content-between align-items-center">
                <!-- Title Kiri -->
                <div class="title_left">
                    <h3>Cuti Disetujui</h3>
                </div>
        
                <!-- Breadcrumb Kanan -->
                <div class="title_right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb float-sm-right m-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cuti Disetujui</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

<div class="clearfix"></div>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Daftar Cuti Disetujui </h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
      
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
@endsection