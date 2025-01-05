@extends('layouts.try');
@section('hom-body')
<form action="{{route('profilecreate')}}" method="Post">
@csrf


  <div class="mb-3">
    <label for="exampleAddress" class="form-label">address</label>
    <input type="text" class="form-control" id="exampleInputAddress1">
   
  </div>
  <div class="mb-3">
    <label for="exampleInputContact" class="form-label">Contact number</label>
    <input type="text" class="form-control" id="exampleInputContact1">
  </div>
  <!-- <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <button type="submit" class="btn btn-primary">Submit</button>

</form>
@endsection