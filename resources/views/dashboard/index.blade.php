@extends('main')

@section('main_content')
<div class="d-flex">
    <!-- Sidebar dengan Collapse -->
    <div id="sidebar" class="bg-success text-white vh-100 collapse show" style="width: 250px;">
        <x-sidebar /> 
    </div>

    <div class="flex-grow-1">
        <!-- Navbar dengan tombol hamburger -->
        <x-navbar />

        <!-- Konten Utama -->
        <div class="container mt-4">
            @yield('content')
        </div>
    </div>
</div>

<script>
    document.getElementById('toggleSidebar').addEventListener('click', function() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('show');
    });
</script>

@endsection