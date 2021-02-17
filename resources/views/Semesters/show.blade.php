@extends('layouts.app')

@section('title','Data Semesters')

@section('content')
<div class="card">
<div class="cardbody">
<h3>Id :{{ $semesters['id'] }} </h3>
<h3>Semester :{{ $semesters['semester'] }} </h3>

 </div>
</div>
@endsection

    
