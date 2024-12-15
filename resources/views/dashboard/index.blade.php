@extends('main')

@section('main_content')

{{-- <div id="sidebar">
    <x-sidebar /> 
</div>

<div id="main-content">
        <x-navbar />
  
        <div class="content px-4 py-3">
            @yield('content')
        </div>
    </div> --}}
        <x-sidebar /> 
        
        <div class="main-content">
            <x-navbar />
            <div class="container-fluid p-3 px-4">
                @yield('content')
            </div>
        </div>
@endsection