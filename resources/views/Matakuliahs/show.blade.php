@extends('layouts.app')

@section('title','Data Matakuliahs')

@section('content')
<div class="card">
<div class="cardbody">
<h3>Nama MataKuliah :{{ $matakuliahs['nama_matakuliah'] }} </h3>
<h3>Jumlah SKS :{{ $matakuliahs['alamat'] }} </h3>

 </div>
</div>
@endsection

    
