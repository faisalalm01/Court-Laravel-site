{{-- <div class="navbar" style="border: 0;">
    <a href="" class="site_title" style="text-decoration: none;">
        <span> PN-Purwokerto</span>
    </a>
</div>
@if (auth()->user()->pegawai->jabatan->nama_jabatan === 'PANITERA' ||
        auth()->user()->pegawai->jabatan->nama_jabatan === 'SEKRETARIS' ||
        auth()->user()->pegawai->jabatan->nama_jabatan === 'KETUA' ||
        auth()->user()->pegawai->jabatan->nama_jabatan === 'PANMUD HUKUM' ||
        auth()->user()->pegawai->jabatan->nama_jabatan === 'PANMUD HUKUM GUGATAN' ||
        auth()->user()->pegawai->jabatan->nama_jabatan === 'PANMUD HUKUM PERMOHONAN' ||
        auth()->user()->pegawai->jabatan->nama_jabatan === 'KASUBAG KEPEGAWAIAN DAN ORTALA' ||
        auth()->user()->pegawai->jabatan->nama_jabatan === 'KASUBAG PERNCANAAN, IT DAN PELAPORAN' ||
        auth()->user()->pegawai->jabatan->nama_jabatan === 'KASUBAG UMUM DAN KEUANGAN')
    <div class="menu_section">
        <h3>Menu Khusus</h3>
        <ul class="nav side-menu">
            <li>
                <a href="#SubMenuKhusus" data-toggle="collapse" aria-expanded="false" style="text-decoration: none;">
                    <i class="fa fa-calendar"></i> Approve Cuti
                    <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="collapse list-unstyled px-5 pb-2" id="SubMenuKhusus">
                    <li><a href="{{ route('dashboard.user.daftar-approve-cuti') }}"
                            style="text-decoration: none;">Approval
                            Cuti</a></li>
                </ul>

            </li>
        </ul>
    </div>
@endif

<div class="menu_section">
    <h3 style="border: 0;">General</h3>

    <ul class="nav side-menu">
        <li><a href="{{ route('dashboard') }}" style="text-decoration: none;"><i class="fa fa-home"></i> Dashboard</a>
        </li>
    </ul>
</div>

<div class="menu_section">
    <h3 style="border: 0;">Management</h3>
    <ul class="nav side-menu">
        <!-- Dropdown Pengajuan Cuti -->
        <li>
            <a href="#pengajuanCutiSubmenu" data-toggle="collapse" aria-expanded="false" style="text-decoration: none;">
                <i class="fa fa-calendar"></i> Pengajuan Cuti
                <span class="fa fa-chevron-down"></span>
            </a>
            @if (auth()->user()->role !== 'Admin')
                <ul class="collapse list-unstyled px-5 pb-2" id="pengajuanCutiSubmenu">
                    <li class=""><a href="{{ route('dashboard.user.pengajuan-cuti') }}"
                            style="text-decoration: none;">Ajukan
                            Cuti</a>
                    </li>
                    <li><a href="{{ route('dashboard.user.daftar-approval') }}" style="text-decoration: none;">Menunggu
                            Approval</a>
                    </li>
                </ul>
            @else
                <ul class="collapse list-unstyled px-5 pb-2" id="pengajuanCutiSubmenu">
                    <li class=""><a href="index.php?page=ajukan_cuti" style="text-decoration: none;">Ajukan
                            Cuti</a>
                    </li>
                    <li><a href="index.php?page=daftar_approval" style="text-decoration: none;">Menunggu Approval</a>
                    </li>
                </ul>
            @endif
        </li>

        <!-- Dropdown Data Pengajuan Cuti -->
        <li>
            <a href="#dataPengajuanCutiSubmenu" data-toggle="collapse" aria-expanded="false"
                style="text-decoration: none;">
                <i class="fa fa-bell"></i> Data Pengajuan Cuti
                <span class="fa fa-chevron-down"></span>
            </a>
            @if (auth()->user()->role !== 'Admin')
                <ul class="collapse list-unstyled px-5 pb-2" id="dataPengajuanCutiSubmenu">
                    <li><a href="{{ route('dashboard.user.data.cuti.disetujui') }}"
                            style="text-decoration: none;">Disetujui</a></li>
                    <li><a href="{{ route('dashboard.user.data.cuti.perubahan') }}"
                            style="text-decoration: none;">Perubahan</a></li>
                    <li><a href="{{ route('dashboard.user.data.cuti.ditangguhkan') }}"
                            style="text-decoration: none;">Ditangguhkan</a></li>
                    <li><a href="{{ route('dashboard.user.data.cuti.tidak.disetujui') }}"
                            style="text-decoration: none;">Tidak
                            Disetujui</a></li>
                </ul>
            @else
                <ul class="collapse list-unstyled px-5 pb-2" id="dataPengajuanCutiSubmenu">
                    <li><a href="index.php?page=disetujui" style="text-decoration: none;">Disetujui</a></li>
                    <li><a href="index.php?page=perubahan" style="text-decoration: none;">Perubahan</a></li>
                    <li><a href="index.php?page=ditangguhkan" style="text-decoration: none;">Ditangguhkan</a></li>
                    <li><a href="index.php?page=tidakdisetujui" style="text-decoration: none;">Tidak Disetujui</a></li>
                </ul>
            @endif

        </li>

        <!-- Dropdown Data Histori -->
        <li>
            <a href="#dataHistoriSubmenu" data-toggle="collapse" aria-expanded="false" style="text-decoration: none;">
                <i class="fa fa-list"></i> Data Histori
                <span class="fa fa-chevron-down"></span>
            </a>
            @if (auth()->user()->role !== 'Admin')
                <ul class="collapse list-unstyled px-5 pb-2" id="dataHistoriSubmenu">
                    <li><a href="{{ route('dashboard.user.daftar-cuti') }}" style="text-decoration: none;">Daftar
                            Cuti</a></li>
                    <li><a href="{{ route('dashboard.user.daftar-knp') }}" style="text-decoration: none;">Daftar
                            KNP</a></li>
                    <li><a href="{{ route('dashboard.user.daftar-kgb') }}" style="text-decoration: none;">Daftar
                            KGB</a></li>
                </ul>
            @else
                <ul class="collapse list-unstyled px-5 pb-2" id="dataHistoriSubmenu">
                    <li><a href="daftar_cuti" style="text-decoration: none;">Daftar Cuti</a></li>
                    <li><a href="daftar_knp" style="text-decoration: none;">Daftar KNP</a></li>
                    <li><a href="daftar_kgb" style="text-decoration: none;">Daftar KGB</a></li>
                </ul>
            @endif
        </li>
    </ul>
</div> --}}
<!-- Sidebar -->
<aside id="sidebar" class="d-flex flex-column flex-shrink-0 p-3 border-end vh-100" style="width: 280px; transition: width 0.3s;">
    <!-- Toggle Button -->
    <button id="sidebarToggle" class="btn mb-3">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Sidebar Content -->
    <a href="/" class="d-flex align-items-center mb-3 text-decoration-none text-primary">
        <span id="sidebar-logo" class="fs-4 fw-bold"><i class="fas fa-wrench me-2"></i> <span class="sidebar-text">Hope UI</span></span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="#" class="nav-link text-dark">
                <i class="fas fa-table-columns"></i> <span class="sidebar-text ms-2">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-dark">
                <i class="fas fa-layer-group"></i> <span class="sidebar-text ms-2">Menu Style</span>
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-dark">
                <i class="fas fa-palette"></i> <span class="sidebar-text ms-2">Design System</span>
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-dark">
                <i class="fas fa-user-shield"></i> <span class="sidebar-text ms-2">Authentication</span>
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-dark">
                <i class="fas fa-users"></i> <span class="sidebar-text ms-2">Users</span>
            </a>
        </li>
        
    </ul>
</aside>
