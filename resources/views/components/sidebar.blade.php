<!-- resources/views/components/sidebar.blade.php -->
<div class="navbar" style="border: 0;">
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
  </div>

