@extends('layouts.try');
@section('hom-body')
<h3>Create Pro</h3>
<form action="{{route('profilecreate')}}" method="Post" class="m-3 p-5">
@csrf

  <div class="mb-3">
    <label for="exampleAddress" class="form-label">address</label>
    <input type="text" class="form-control" id="exampleInputAddress1">
   
  </div>
  <div class="mb-3">
    <label for="exampleInputContact" class="form-label">Contact number</label>
    <input type="text" class="form-control" id="exampleInputContact1">
  </div>
 
  <div class="mb-3">
    <label for="exampleInputDOB" class="form-label">Date Of Birth</label>
    <input type="date" class="form-control" id="exampleInputDOB">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>

</form>
@endsection