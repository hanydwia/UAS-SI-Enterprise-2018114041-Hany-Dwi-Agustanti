@extends('layouts.app')

@section('title','Data Absens')

@section('content')
<div class="card">
<div class="cardbody">
<h3>Waktu Absen :{{ $absen['waktu_absen'] }} </h3>
<h3>Mahasiswa_id :{{ $absen['mahasiswa_id'] }} </h3>
<h3>Matakuliah_id:{{ $absen['matakuliah_id'] }} </h3>
<h3>Keterangan :{{ $absen['keterangan'] }} </h3>
 </div>
</div>
@endsection

    
