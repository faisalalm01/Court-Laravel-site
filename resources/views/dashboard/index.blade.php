@extends('main')

@section('main_content')

<div id="sidebar">
    <x-sidebar /> 
</div>

<div id="main-content">
        <x-navbar />
        {{-- <button class="btn btn-primary fixed" id="toggle-sidebar">
            ☰
        </button> --}}
        <div class="content">
            @yield('content')
        </div>
    </div>
    
    <script>
        document.getElementById('toggle-sidebar').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('hidden');
            document.getElementById('main-content').classList.toggle('collapsed');
        });
    </script>

{{-- <div class="sidebar" id="sidebar">
        <a href="#">Dashboard</a>
        <a href="#">Settings</a>
        <a href="#">Profile</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button class="btn btn-outline-secondary" id="toggleSidebar">
                    ☰
                </button>
                <a class="navbar-brand ms-2" href="#">My App</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Content -->
        <div class="mt-4">
            @yield('content')
        </div>
    </div>

    <script>
        document.getElementById('toggleSidebar').addEventListener('click', () => {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('collapsed');
        });
    </script> --}}
@endsection