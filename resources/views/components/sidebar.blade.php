<!-- resources/views/components/sidebar.blade.php -->
{{-- <div class="navbar" style="border: 0;">
    <a href="" class="site_title"></i><span> PN-Purwokerto</span></a>
  </div>
<div class="menu_section">
    <h3>General</h3>
    <ul class="nav side-menu">
    <li><a href=""><i class="fa fa-home"></i> Dashboard</a></li>
  </ul>
  </div>
      <div class="menu_section">
      <h3>Menu Khusus</h3>
      <ul class="nav side-menu">
        <li><a href="#"><i class="fa fa-calendar"></i> Approval Cuti <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="">Approve Cuti</a></li>
          </ul>
        </li>
      </ul>
      </div>


  <div class="menu_section">
    <h3>Management</h3>
    <ul class="nav side-menu">
      <li><a href="#"><i class="fa fa-calendar"></i> Pengajuan Cuti <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="index.php?page=ajukan_cuti">Ajukan Cuti</a></li>
          <li><a href="index.php?page=daftar_approval">Menunggu Approval</a></li>
        </ul>
      </li>
      <li><a href="#"><i class="fa fa-bell"></i>Data Pengajuan Cuti <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="index.php?page=disetujui">Disetujui</a></li>
          <li><a href="index.php?page=perubahan">Perubahan</a></li>
          <li><a href="index.php?page=ditangguhkan">Ditangguhkan</a></li>
          <li><a href="index.php?page=tidakdisetujui">Tidak Disetujui</a></li>
        </ul>
      </li>
      <li><a href="#"><i class="fa fa-list"></i> Data Histori <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="index.php?page=daftar_cuti">Daftar Cuti</a></li>
          <li><a href="index.php?page=daftar_knp">Daftar KNP</a></li>
          <li><a href="index.php?page=daftar_kgb">Daftar KGB</a></li>
        </ul>
      </li>
    </ul>
  </div> --}}


<!-- resources/views/components/sidebar.blade.php -->
<div class="navbar" style="border: 0;">
    <a href="" class="site_title" style="text-decoration: none;">
        <span> PN-Purwokerto</span>
    </a>
</div>
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
            @if (auth()->user()->role === 'Admin')
                <ul class="collapse list-unstyled px-5 pb-2" id="dataPengajuanCutiSubmenu">
                    <li><a href="index.php?page=disetujui" style="text-decoration: none;">Disetujui</a></li>
                    <li><a href="index.php?page=perubahan" style="text-decoration: none;">Perubahan</a></li>
                    <li><a href="index.php?page=ditangguhkan" style="text-decoration: none;">Ditangguhkan</a></li>
                    <li><a href="index.php?page=tidakdisetujui" style="text-decoration: none;">Tidak Disetujui</a></li>
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
</div>
