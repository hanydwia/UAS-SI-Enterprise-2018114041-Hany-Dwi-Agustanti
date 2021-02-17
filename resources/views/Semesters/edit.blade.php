@extends('layouts.app')

@section('title','Semesters')

@section('content')
        
<div class="card shadow mb-3">
            <div class="card-header py-3">  
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Semester</th>
                      
                    </tr>
                <tbody>
                  @foreach ($semesters as $semester)
                  <tr>
                    <td> {{ $semester['id'] }} </td>
                    <td> {{ $semester['semester'] }} </td>
            
                    <td> <a href="/semesters/{{ $semester['id'] }}/edit">Edit Data
                    </td>
                    <td> <form action="/semesters/{{ $semester['id'] }}" method="post">
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
      <form action="/semesters/{{ $semester['id'] }}" method="POST">

          @csrf

      <div class="modal-body">
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Id</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="id" name="id">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Semester</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="semester" name="semester">
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
    {{ $semesters -> links() }}
    </div>
@endsection
