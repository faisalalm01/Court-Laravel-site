@extends('dashboard.index')

@section('content')
    <div role="main">
        <div class="px-3">
            <dis class="p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <!-- Title Kiri -->
                    <div class="title_left">
                        <h3 class="text-2xl">Pengajuan Cuti</h3>
                    </div>

                    <!-- Breadcrumb Kanan -->
                    <div class="title_right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb float-sm-right m-0">
                                <li class="breadcrumb-item"><a href="#">Home /</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Ajukan Cuti</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </dis>


            <div class="clearfix"></div>

            <div class="">
                <div class=""></div>
                <div class="">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2 class="text-xl">Form Pengajuan Cuti</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form method="POST" action="{{ route('dashboard.user.tambah.pengajuan-cuti') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Jenis cuti yang diambil</label>
                                    <select class="form-control" name="jenis_cuti">
                                        <option disabled selected>-- Pilih jenis cuti --</option>
                                        <option value="Cuti Tahunan">Cuti Tahunan</option>
                                        <option value="Cuti Besar">Cuti Besar</option>
                                        <option value="Cuti Sakit">Cuti Sakit</option>
                                        @if (auth()->user()->pegawai->jenis_kelamin === 'P')
                                            <option value="Cuti Melahirkan">Cuti Melahirkan</option>
                                        @else
                                            <option value="Cuti Melahirkan" disabled class="bg-gray-300">Cuti Melahirkan
                                            </option>
                                        @endif
                                        <option value="Cuti Karena Alasan Penting">Cuti Karena Alasan Penting</option>
                                        <option value="Cuti diluar Tanggungan Negara">Cuti diluar Tanggungan Negara</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Alasan Cuti</label>
                                    <input type="text" required class="form-control" placeholder="Masukkan alasan cuti"
                                        name="alasan_cuti">
                                </div>
                                <div class="form-group">
                                    <label for="">Lamanya cuti</label>
                                    <input type="text" required class="form-control" placeholder="Masukan berapa lama"
                                        name="lama_cuti">
                                    <select name="ket_lamacuti" class="form-control select2">
                                        <option disabled selected>-- Pilih Hari, Bulan, Tahun --</option>
                                        <option value="Hari">Hari</option>
                                        <option value="Minggu">Minggu</option>
                                        <option value="Bulan">Bulan</option>
                                        <option value="Tahun">Tahun</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Dari tanggal</label>
                                    <input type="date" required class="form-control" name="dari_tanggal">
                                </div>
                                <div class="form-group">
                                    <label for="">Sampai dengan</label>
                                    <input type="date" required class="form-control" name="sampai_dengan">
                                </div>
                                <div class="form-group">
                                    <label for="">Atasan</label>
                                    <select class="form-control" name="atasan">
                                        @if (auth()->user()->pegawai->jabatan->nama_jabatan === 'JURU SITA' ||
                                                auth()->user()->pegawai->jabatan->nama_jabatan === 'JURU SITA PENGGANTI' ||
                                                auth()->user()->pegawai->jabatan->nama_jabatan === 'PANITERA PENGGANTI' ||
                                                auth()->user()->pegawai->jabatan->nama_jabatan === 'PANMUD HUKUM' ||
                                                auth()->user()->pegawai->jabatan->nama_jabatan === 'PANMUD GUGATAN')
                                            <option value="panitera">PANITERA</option>
                                        @elseif (auth()->user()->pegawai->jabatan->nama_jabatan === 'KASUBAG KEPEGAWAIAN DAN ORTALA' ||
                                                auth()->user()->pegawai->jabatan->nama_jabatan === 'KASUBAG PERNCANAAN, IT DAN PELAPORAN' ||
                                                auth()->user()->pegawai->jabatan->nama_jabatan === 'KASUBAG UMUM DAN KEUANGAN')
                                            <option value="sekretaris">SEKRETARIS</option>
                                        @elseif (auth()->user()->pegawai->jabatan->nama_jabatan === 'PANITERA' ||
                                                auth()->user()->pegawai->jabatan->nama_jabatan === 'SEKRETARIS' ||
                                                auth()->user()->pegawai->jabatan->nama_jabatan === 'HAKIM UTAMA MUDA' ||
                                                auth()->user()->pegawai->jabatan->nama_jabatan === 'HAKIM MADYA UTAMA' ||
                                                auth()->user()->pegawai->jabatan->nama_jabatan === 'WAKIL KETUA')
                                            <option value="ketua">KETUA</option>
                                        @elseif (auth()->user()->pegawai->jabatan->nama_jabatan === 'STAFF PELAKSANA PANMUD HUKUM')
                                            <option value="panmudhukum">PANMUD HUKUM</option>
                                        @elseif (auth()->user()->pegawai->jabatan->nama_jabatan === 'STAFF PELAKSANA PANMUD GUGATAN')
                                            <option value="panmudgugatan">PANMUD GUGATAN</option>
                                        @elseif (auth()->user()->pegawai->jabatan->nama_jabatan === 'STAFF PELAKSANA PANMUD PERMOHONAN')
                                            <option value="panmudpermohonan">PANMUD PERMOHONAN</option>
                                        @elseif (auth()->user()->pegawai->jabatan->nama_jabatan === 'STAFF PELAKSANA KEPEGAWAIAN DAN ORTALA')
                                            <option value="kasubagortala">KASUBAG KEPEGAWAIAN DAN ORTALA</option>
                                        @elseif (auth()->user()->pegawai->jabatan->nama_jabatan === 'STAFF PELAKSANA PERNCANAAN, IT DAN PELAPORAN')
                                            <option value="kasubagit">KASUBAG PERNCANAAN, IT DAN PELAPORAN</option>
                                        @elseif (auth()->user()->pegawai->jabatan->nama_jabatan === 'STAFF PELAKSANA PRAKOM')
                                            <option value="sekretaris">SEKRETARIS</option>
                                        @elseif (auth()->user()->pegawai->jabatan->nama_jabatan === 'STAFF PELAKSANA UMUM DAN KEUANGAN')
                                            <option value="kasubagkeuangan">KASUBAG UMUM DAN KEUANGAN</option>
                                        @elseif (auth()->user()->pegawai->jabatan->nama_jabatan === 'KETUA')
                                            <option value="ketualangsung">-</option>
                                        @endif
                                    </select>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Ajukan Cuti</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3"></div>
            </div>
        </div>
    </div>
@endsection
