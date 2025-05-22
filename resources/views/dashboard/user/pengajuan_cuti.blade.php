@extends('dashboard.index')

@section('content')

    <div role="main">
        <div class="px-3">
            <!-- <div class="p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="title_left">
                        <h3 class="text-2xl">Pengajuan Cuti</h3>
                    </div>

                    <div class="title_right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb float-sm-right m-0">
                                <li class="breadcrumb-item"><a href="#">Home /</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Ajukan Cuti</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div> -->
                <div class="p-3">
                    <div class="flex justify-between items-center">
                        <div class="title_left">
                            <h3 class="text-2xl font-semibold">Pengajuan Cuti</h3>
                        </div>
                        <div class="title_right">
                            <nav aria-label="breadcrumb">
                                <ol class="flex space-x-2 text-gray-600">
                                    <li><a href="#" class="hover:underline">Home</a> /</li>
                                    <li class="text-gray-800 font-medium">Ajukan Cuti</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

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
                            <form method="POST" action="{{ route('dashboard.user.tambah.pengajuan-cuti') }}" id="cutiForm">
                                @csrf
                                <div class="form-group">
                                    <label>Jenis cuti yang diambil</label>
                                    <select class="form-control" name="jenis_cuti" id="jenis_cuti" required>
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
                                    <input type="number" required class="form-control" placeholder="Masukan berapa lama"
                                        name="lama_cuti" id="lama_cuti" min="1">
                                    <select name="ket_lamacuti" class="form-control select2" id="ket_lamacuti" required>
                                        <option disabled selected>-- Pilih Hari, Bulan, Tahun --</option>
                                        <option value="Hari">Hari</option>
                                        <option value="Minggu">Minggu</option>
                                        <option value="Bulan">Bulan</option>
                                        <option value="Tahun">Tahun</option>
                                    </select>
                                    <small id="max_cuti_info" class="text-muted"></small>
                                </div>
                                <div class="form-group">
                                    <label for="">Dari tanggal</label>
                                    <input type="date" required class="form-control" name="dari_tanggal" id="dari_tanggal" min="{{ date('Y-m-d') }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Sampai dengan</label>
                                    <input type="date" required class="form-control" name="sampai_dengan" id="sampai_dengan" disabled>
                                    <small id="date_error" class="text-danger"></small>
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat selama cuti</label>
                                    <textarea class="form-control" placeholder="Masukkan alamat lengkap selama cuti" name="alamat" required></textarea>
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
                                    <button type="submit" class="btn btn-primary" id="submitBtn">Ajukan Cuti</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3"></div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const jenisCuti = document.getElementById('jenis_cuti');
            const lamaCuti = document.getElementById('lama_cuti');
            const ketLamaCuti = document.getElementById('ket_lamacuti');
            const dariTanggal = document.getElementById('dari_tanggal');
            const sampaiDengan = document.getElementById('sampai_dengan');
            const maxCutiInfo = document.getElementById('max_cuti_info');
            const dateError = document.getElementById('date_error');
            const form = document.getElementById('cutiForm');
            const submitBtn = document.getElementById('submitBtn');

            // Aturan lamanya cuti berdasarkan jenis cuti
            const cutiRules = {
                'Cuti Tahunan': { max: 12, unit: 'Hari', text: 'Maksimal 12 Hari' },
                'Cuti Besar': { max: 3, unit: 'Bulan', text: 'Maksimal 3 Bulan' },
                'Cuti Sakit': { max: 14, unit: 'Hari', text: 'Maksimal 14 Hari' },
                'Cuti Melahirkan': { max: 3, unit: 'Bulan', text: 'Maksimal 3 Bulan' },
                'Cuti Karena Alasan Penting': { max: 2, unit: 'Hari', text: 'Maksimal 2 Hari' },
                'Cuti diluar Tanggungan Negara': { max: 5, unit: 'Tahun', text: 'Maksimal 5 Tahun' }
            };

            // Update info maksimal cuti ketika jenis cuti berubah
            jenisCuti.addEventListener('change', function() {
                const selectedCuti = this.value;
                if (cutiRules[selectedCuti]) {
                    maxCutiInfo.textContent = cutiRules[selectedCuti].text;
                    ketLamaCuti.value = cutiRules[selectedCuti].unit;
                    
                    // Set max value based on cuti rules
                    lamaCuti.max = cutiRules[selectedCuti].max;
                    
                    // Auto-select the unit in dropdown
                    const options = ketLamaCuti.options;
                    for (let i = 0; i < options.length; i++) {
                        if (options[i].value === cutiRules[selectedCuti].unit) {
                            options[i].selected = true;
                            break;
                        }
                    }
                } else {
                    maxCutiInfo.textContent = '';
                }
            });

            // Enable sampai_dengan when dari_tanggal is selected
            dariTanggal.addEventListener('change', function() {
                sampaiDengan.disabled = false;
                sampaiDengan.min = this.value;
                calculateEndDate();
            });

            // Calculate end date based on duration
            lamaCuti.addEventListener('input', calculateEndDate);
            ketLamaCuti.addEventListener('change', calculateEndDate);

            function calculateEndDate() {
                if (!dariTanggal.value || !lamaCuti.value || !ketLamaCuti.value) return;

                const startDate = new Date(dariTanggal.value);
                const duration = parseInt(lamaCuti.value);
                const unit = ketLamaCuti.value;

                let endDate = new Date(startDate);

                switch(unit) {
                    case 'Hari':
                        endDate.setDate(startDate.getDate() + duration);
                        break;
                    case 'Minggu':
                        endDate.setDate(startDate.getDate() + (duration * 7));
                        break;
                    case 'Bulan':
                        endDate.setMonth(startDate.getMonth() + duration);
                        break;
                    case 'Tahun':
                        endDate.setFullYear(startDate.getFullYear() + duration);
                        break;
                }

                // Format date to YYYY-MM-DD
                const formattedDate = endDate.toISOString().split('T')[0];
                sampaiDengan.value = formattedDate;
                
                validateDateRange();
            }

            // Validate date range doesn't exceed duration
            sampaiDengan.addEventListener('change', validateDateRange);

            function validateDateRange() {
                if (!dariTanggal.value || !sampaiDengan.value) return;

                const start = new Date(dariTanggal.value);
                const end = new Date(sampaiDengan.value);
                const diffTime = Math.abs(end - start);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                
                const selectedCuti = jenisCuti.value;
                const maxDays = getMaxDays(selectedCuti, cutiRules);

                if (diffDays > maxDays) {
                    dateError.textContent = `Rentang cuti tidak boleh melebihi ${maxDays} hari`;
                    submitBtn.disabled = true;
                } else {
                    dateError.textContent = '';
                    submitBtn.disabled = false;
                }
            }

            function getMaxDays(cutiType, rules) {
                if (!rules[cutiType]) return 0;
                
                const rule = rules[cutiType];
                switch(rule.unit) {
                    case 'Hari': return rule.max;
                    case 'Minggu': return rule.max * 7;
                    case 'Bulan': return rule.max * 30; // Approximate
                    case 'Tahun': return rule.max * 365; // Approximate
                    default: return 0;
                }
            }

            // Form validation before submit
            form.addEventListener('submit', function(e) {
                if (!validateForm()) {
                    e.preventDefault();
                }
            });

            function validateForm() {
                // Check if dates are in the past
                const today = new Date();
                today.setHours(0, 0, 0, 0);
                
                const startDate = new Date(dariTanggal.value);
                if (startDate < today) {
                    dateError.textContent = 'Tanggal cuti tidak boleh di tanggal yang sudah dilewati';
                    return false;
                }

                return true;
            }
        });
    </script>
@endsection