@extends('layouts.app')

@section('title','Jadwals')

@section('content')

<!-- Button trigger modal -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-plus fa-sm text-white-50"></i>
              Tambah Jadwal
            </button> 
          </div>


<table class="table table-success table-striped">
  <thead>
    <tr>
      <th scope="col">Jadwal</th>
      <th scope="col">Matakuliah</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($jadwals as $jadwal)
  <tr>
    <td>{{$jadwal->jadwal}}</td>
    <td>{{$jadwal->matakuliah_id}}</td>
    <td><a href="/jadwals/{{$jadwal->id}}/edit"><button type="button" class="btn btn-outline-primary">Edit</a></button></td>
    <form action="/jadwals/{{ $jadwal->id}}" method="POST">
    @csrf
    @method('DELETE')
    <td><button class="btn btn-outline-danger">Delete</button></td>
    </form>
    </tr>
    @endforeach
  </tbody>
</table>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Masukkan Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/jadwals" method="POST">

          @csrf

      <div class="modal-body">
           <div class="row mb-3">
            <label for="inputtext3" class="col-sm-3 col-form-label">Jadwal</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="jadwal" name="jadwal">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-3 col-form-label">Matakuliah</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="matakuliah_id" name="matakuliah_id">
            </div>
          </div>
        
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Input</button>
      </div>
    </form>
    </div>
  </div>
</div>
    {{ $jadwals -> links() }}
    </div>
@endsection