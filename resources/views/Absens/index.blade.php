@extends('layouts.app')

@section('title','Absens')

@section('content')

<!-- Button trigger modal -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-plus fa-sm text-white-50"></i>
              Tambah Absen Mahasiswa
            </button> 
          </div>


<table class="table table-success table-striped">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Waktu Absen</th>
      <th scope="col">Mahasiswa</th>
      <th scope="col">Matakuliah</th>
      <th scope="col">Keterangan</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($absens as $absen)
  <tr>
    <td>{{$absen->id}}</td>
    <td>{{$absen->waktu_absen}}</td>
    <td>{{$absen->mahasiswa_id}}</td>
    <td>{{$absen->matakuliah_id}}</td>
    <td>{{$absen->keterangan}}</td>
    @csrf
    @method('DELETE')
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
      <form action="/students" method="POST">

          @csrf

      <div class="modal-body">
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Id</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="id" name="id">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Waktu Absen</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="wakktu_absen" name="waktu_absen">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-3 col-form-label">Mahasiswa</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="mahasiswa_id" name="maahasiswa_id">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputtext3" class="col-sm-3 col-form-label">Matakuliah</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="matakuliah_id" name="matakuliah_id">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-3 col-form-label">Keterangan</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="keterangan" name="keterangan">
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
    {{ $absens -> links() }}
    </div>
@endsection