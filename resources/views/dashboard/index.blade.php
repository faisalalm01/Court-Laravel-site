@extends('main')

@section('main_content')
{{-- <div class="d-flex">

    <div id="sidebar" class="bg-success text-white overflow-y-auto show " style="width: 250px; height: 100vh; position: fixed;">
        <x-sidebar /> 
    </div>    

    <div class="flex-grow-1" style="margin-left: 250px;">
        <x-navbar />

        <div class="container mt-2">
            @yield('content')
        </div>
    </div>
</div>

<script>

</script> --}}
<style>

</style>
<!-- Sidebar -->
<div id="sidebar">
    <x-sidebar /> 
</div>

    <!-- Main Content -->
    <div id="main-content" class="p-4">
        <!-- Hamburger Button -->
        <button class="btn btn-primary fixed" id="toggle-sidebar">
            ☰
        </button>
        <div class="content">
            @yield('content')
        </div>
    </div>
    
    <!-- Bootstrap JS and custom script -->
    <script>
        document.getElementById('toggle-sidebar').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('hidden');
            document.getElementById('main-content').classList.toggle('collapsed');
        });
    </script>
@endsection