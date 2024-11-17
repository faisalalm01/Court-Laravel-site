@extends('main')

@section('main_content')
<div class="d-flex">

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

</script>

@endsection