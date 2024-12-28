@extends('main')

@section('main_content')
<div class="flex min-h-screen bg-green-700">
    <x-sidebar />
    <div class="flex flex-col flex-1 bg-gray-200">
        <x-navbar />
        <div class="flex-1 container mx-auto p-6">
            @yield('content')
        </div>
        <x-footer />
    </div>
</div>
 
@endsection