@extends('layouts.app')

@section('title','Absens')

@section('content')
        
<div class="card shadow mb-3">
            <div class="card-header py-3">  
              <h6 class="m-0 font-weight-bold text-primary">Data</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Waktu Absen</th>
                      <th>Mahasiswa</th>
                      <th>Matakuliah_id</th> 
                      <th>Keterangan</th>
                    </tr>
                <tbody>
                  @foreach ($absens as $absen)
                  <tr>
                    <td> {{ $absen['id'] }} </td>
                    <td> {{ $absen['waktu_absen'] }} </td>
                    <td> {{ $absen['mahasiswa_id'] }} </td>
                    <td> {{ $absen['matakuliah_id'] }} </td>
                    <td> {{ $absen['keterangan'] }} </td>
                    <td> <a href="/absens/{{ $absen['id'] }}/edit">Edit Data
                    </td>
                    <td> <form action="/absens/{{ $absen['id'] }}" method="post">
                       @csrf
                      @method('DELETE')
                      <button class="card-link btn-danger">Hapus Data</button> </td>
                  </tr>
                  @endforeach
                </tbody>
                </table>
              </div>
            </div>
          </div>

          </div>
        <!-- End of Main Content -->

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
      <form action="/absens/{{ $absen['id'] }}" method="POST">

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
              <input type="text" class="form-control" id="waktu_absen" name="waktu_absen">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Mahasiswa</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="mahasiswa_id" name="mahasiswa_id">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-3 col-form-label">Matakuliah</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="matakuliah_id" name="matakuliah_id">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputtext3" class="col-sm-3 col-form-label">Keterangan</label>
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
<div>
    {{ $absens -> links() }}
    </div>
@endsection
