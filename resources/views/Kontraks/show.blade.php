@extends('layouts.app')

@section('title','Data Kontrak')

@section('content')
<div class="card">
<div class="cardbody">
<h3>mahasiswa_id :{{ $kontrak['mahasiswa_id'] }} </h3>
<h3>semester_id :{{ $kontrak['semester_id'] }} </h3>

 </div>
</div>
@endsection

    
