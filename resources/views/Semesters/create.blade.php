@extends('layouts.app')

@section('title','Semesters')

@section('content')

<form action="/semesters" method="POST">
@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Id</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="id" aria-describedby="emailHelp" value="{{old('id')}}">
    @error('id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Semester</label>
    <input type="text" class="form-control" name="semesters" id="exampleInputPassword1" value="{{old('semesters')}}">
    @error('semesters')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection

    
