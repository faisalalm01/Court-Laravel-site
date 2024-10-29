<!-- resources/views/user/index.blade.php -->

@extends('welcome')

@section('content')
<div class="container body">
   <div class="main_container">
      <div class="col-md-3 left_col">
         <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
            </div>
            <br />
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            </div>
         </div>
      </div>

      <div class="top_nav">
         <div class="nav_menu">
            <nav>
               <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
               </div>

               <ul class="nav navbar-nav navbar-right">
                  <li>
                     <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        @if(empty($user->foto))
                        @else
                           <img src="{{ asset('build/images/thump_' . $user->foto) }}">{{ $user->nip }}
                        @endif
                        <span class=" fa fa-angle-down"></span>
                     </a>
                     <ul class="dropdown-menu dropdown-usermenu pull-right">
\                        <li><a href="#"><i class="fa fa-book pull-right"></i> User Manual</a></li>
                        <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                     </ul>
                  </li>
               </ul>
            </nav>
         </div>
      </div>

      <div class="right_col" role="main">
         @if(isset($cuti_pegawai) && count($cuti_pegawai) > 0)
            <span class="badge bg-green">{{ $cuti_pegawai->count() }}</span>
            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
               @foreach($cuti_pegawai as $cuti)
                  <li>
                     <a>
                        @if(empty($cuti->foto))
                           <span class="image"><img src="{{ asset('build/images/user.png') }}"></span>
                        @else
                           <span class="image"><img src="{{ asset('build/images/thump_' . $cuti->foto) }}"></span>
                        @endif
                        <span>
                           <span>{{ $cuti->nama_pegawai }}</span>
                        </span>
                        <span>{{ $cuti->nip }}</span>
                        <span class="message">{{ $cuti->ket_status_cuti }}</span>
                     </a>
                  </li>
               @endforeach
               <li>
                  <div class="text-center">
                     <a href="{{ route('approve_cuti') }}" class="btn btn-success">
                        <strong>Approve sekarang</strong>
                     </a>
                  </div>
               </li>
            </ul>
         @endif
      </div>

      <footer>
         <div class="pull-right">
            PN-Purwokerto - Copyright &copy; {{ date('Y') }}
         </div>
         <div class="clearfix"></div>
      </footer>
   </div>
</div>
@endsection

