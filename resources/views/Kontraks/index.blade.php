@extends('layouts.app')

@section('title','Kontraks')

@section('content')

<!-- Button trigger modal -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data</h1>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-plus fa-sm text-white-50"></i>
              Tambah Data kontrak
            </button> 
          </div>


<table class="table table-success table-striped">
  <thead>
    <tr>
      <th scope="col">Mahasiswa_Id</th>
      <th scope="col">Semester_id</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($kontraks as $kontrak)
  <tr>
    <td>{{$kontrak->mahasiswa_id}}</td>
    <td>{{$kontrak->semester_id}}</td>
    <td><a href="/kontraks/{{$kontrak->id}}/edit"><button type="button" class="btn btn-outline-primary">Edit</a></button></td>
    <form action="/kontraks/{{ $kontrak->id}}" method="POST">
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
      <form action="/kontraks" method="POST">

          @csrf

      <div class="modal-body">
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Mahasiswa_Id</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="mahasiswa_id" name="mahasiswa_id">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Semester_Id</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="semester_id" name="semester_id">
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
    {{ $kontraks -> links() }}
    </div>
@endsection