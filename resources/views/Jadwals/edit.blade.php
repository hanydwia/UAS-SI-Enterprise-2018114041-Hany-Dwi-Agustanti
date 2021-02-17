@extends('layouts.app')

@section('title','Jadwals')

@section('content')

<form action="/jadwals/{{ $jadwals['id'] }}" method="POST">
@csrf
@method('PUT')

  <div class="form-group">
    <label for="exampleInputEmail1">Jadwal</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="jadwal" aria-describedby="emailHelp" value="{{old('jadwal') ? old('jadwal') : $jadwal['jadwal'] }}">
    @error('jadwal')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">matakuliah_id</label>
    <input type="text" class="form-control" name="matakuliah_id" id="exampleInputPassword1" value="{{old('matakuliah_id') ? old('matakuliah_id') : $jadwal['matakuliah_id'] }}">
    @error('matakuliah_id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection

    
