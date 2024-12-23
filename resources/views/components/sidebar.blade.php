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

  <div  :class="open ? 'translate-x-0' : '-translate-x-full'"
  class="h-screen fixed lg:static inset-y-0 left-0 w-64 bg-green-700 text-white flex-shrink-0 transform transition-transform duration-300 lg:translate-x-0"
 id="main-nav">
    <!-- Logo -->
    <div class="w-full h-20 flex items-center px-4 mb-8">
      <p class="font-semibold text-2xl text-gray-100">PN-Purwokerto</p>
    </div>
  
    <!-- Menu Khusus -->
    @if (in_array(auth()->user()->pegawai->jabatan->nama_jabatan, [
        'PANITERA', 'SEKRETARIS', 'KETUA', 'PANMUD HUKUM',
        'PANMUD HUKUM GUGATAN', 'PANMUD HUKUM PERMOHONAN',
        'KASUBAG KEPEGAWAIAN DAN ORTALA',
        'KASUBAG PERNCANAAN, IT DAN PELAPORAN',
        'KASUBAG UMUM DAN KEUANGAN',
    ]))
      <div class="mb-4 px-2">
        <p class="pl-4 text-sm font-semibold text-gray-100 mb-1">MENU KHUSUS</p>
        <div class="flex items-center text-blue-400 h-10 pl-4 hover:bg-green-600 rounded-lg cursor-pointer">
          <svg class="h-6 w-6 fill-current mr-2" viewBox="0 0 20 20">
            <path d="M..."></path>
          </svg>
          <a href="{{ route('dashboard.user.daftar-approve-cuti') }}" class="text-gray-100">Approve Cuti</a>
        </div>
      </div>
    @endif
  
    <!-- General -->
    <div class="mb-4 px-2">
      <p class="pl-4 text-sm font-semibold text-gray-100 mb-1">GENERAL</p>
      <div class="flex items-center text-blue-400 h-10 pl-4 hover:bg-green-600 rounded-lg cursor-pointer">
          <i class="fa fa-home text-white mr-2"></i>
        <a href="{{ route('dashboard') }}" class="text-gray-100">Dashboard</a>
      </div>
    </div>
  
    <!-- Cuti -->
    <div class="mb-4 px-2">
      <p class="pl-4 text-sm font-semibold text-gray-100 mb-1">CUTI</p>
      <div class="flex flex-col space-y-2">
        <div class="flex items-center text-blue-400 h-10 pl-4 hover:bg-green-600 rounded-lg cursor-pointer" aria-controls="dropdown-pengajuan-cuti" data-collapse-toggle="dropdown-pengajuan-cuti">
          <i class="fa fa-calendar text-white mr-2"></i>
          <button class="text-gray-100">Pengajuan Cuti</button>
          <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </div>
        <ul id="dropdown-pengajuan-cuti" class="hidden py-2 space-y-2">
          <li>
            <a href={{ route('dashboard.user.pengajuan-cuti') }}
              class="flex items-center w-full p-2 text-md font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 pl-11"> Ajukan Cuti</a>
          </li>
          <li>
            <a href={{ route('dashboard.user.daftar-approval') }}
              class="flex items-center w-full p-2 text-md font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 pl-11">Menunggu Aproval</a>
          </li>
        </ul>

        <div class="flex items-center text-blue-400 h-10 pl-4 hover:bg-green-600 rounded-lg cursor-pointer" aria-controls="dropdown-data-pengajuan-cuti" data-collapse-toggle="dropdown-data-pengajuan-cuti">
          <i class="fa fa-bell text-white mr-2"></i>
          <button class="text-gray-100">Data Pengajuan Cuti</button>
          <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </div>
        <ul id="dropdown-data-pengajuan-cuti" class="hidden py-2 space-y-2">
          <li>
            <a href={{ route('dashboard.user.data.cuti.disetujui') }}
              class="flex items-center w-full p-2 text-md font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 pl-11"> Disetujui</a>
          </li>
          <li>
            <a href="{{ route('dashboard.user.data.cuti.perubahan') }}"
              class="flex items-center w-full p-2 text-md font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 pl-11">Perubahan</a>
          </li>
          <li>
            <a href="{{ route('dashboard.user.data.cuti.ditangguhkan') }}"
              class="flex items-center w-full p-2 text-md font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 pl-11">Ditangguhkan</a>
          </li>
          <li>
            <a href="{{ route('dashboard.user.data.cuti.tidak.disetujui') }}"
              class="flex items-center w-full p-2 text-md font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 pl-11">Tidak Disetujui</a>
          </li>
        </ul>

      </div>
    </div>
  
    <!-- Management -->
    <div class="mb-4 px-2">
      <p class="pl-4 text-sm font-semibold text-gray-100 mb-1">MANAGEMENT</p>
      <div class="flex flex-col space-y-2">
        <div class="flex items-center text-blue-400 h-10 pl-4 hover:bg-green-600 rounded-lg cursor-pointer">
          <i class="fa fa-user text-white mr-2"></i>
          <a class="text-gray-100">Data User</a>
        </div>
        
        <div class="flex items-center text-blue-400 h-10 pl-4 hover:bg-green-600 rounded-lg cursor-pointer" aria-controls="dropdown-pegawai" data-collapse-toggle="dropdown-pegawai">
          <i class="fa fa-database text-white mr-2"></i>
          <button class="text-gray-100">Data Pegawai</button>
          <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </div>
        <ul id="dropdown-pegawai" class="hidden py-2 space-y-2">
          <li>
            <a href="#"
              class="flex items-center w-full p-2 text-md font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 pl-11"> Data Pegawai</a>
          </li>
          <li>
            <a href="#"
              class="flex items-center w-full p-2 text-md font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 pl-11">Data Jabatan</a>
          </li>
          <li>
            <a href="#"
              class="flex items-center w-full p-2 text-md font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 pl-11">Data Golongan</a>
          </li>
        </ul>

        <div class="flex items-center text-blue-400 h-10 pl-4 hover:bg-green-600 rounded-lg cursor-pointer" aria-controls="dropdown-history" data-collapse-toggle="dropdown-history">
          <i class="fa fa-list text-white mr-2"></i>
          <button
          class="text-gray-100">Data History</button>
          <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </div>
        <ul id="dropdown-history" class="hidden py-2 space-y-2">
          <li>
            <a href="{{ route('dashboard.user.daftar-cuti') }}"
              class="flex items-center w-full p-2 text-md font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 pl-11">Daftar Cuti</a>
          </li>
          <li>
            <a href="{{ route('dashboard.user.daftar-knp') }}"
              class="flex items-center w-full p-2 text-md font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 pl-11">Daftar KNP</a>
          </li>
          <li>
            <a href="{{ route('dashboard.user.daftar-kgb') }}"
              class="flex items-center w-full p-2 text-md font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 pl-11">Daftar KGB</a>
          </li>
        </ul>

      </div>
    </div>
  </div>
  
  