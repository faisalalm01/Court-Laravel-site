@extends('main')
<div class="col-md-9">
    <h1>Welcome {{ auth()->user()->pegawai->nama_pegawai }}</h1>
</div>