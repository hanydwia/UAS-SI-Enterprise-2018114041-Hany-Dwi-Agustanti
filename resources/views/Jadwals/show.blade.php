@extends('layouts.app')

@section('title','Data Jadwal')

@section('content')
<div class="card">
<div class="cardbody">
<h3>Jadwal :{{ $jadwals['Jadwal'] }} </h3>
<h3>Matakuliah_id :{{ $jadwals['Matakuliah_id'] }} </h3>

 </div>
</div>
@endsection

    
