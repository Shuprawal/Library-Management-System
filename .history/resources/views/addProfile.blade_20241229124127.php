@extends('layouts.try');
@section('hom-body')
<form action="{{route('profilecreate')}}" method="Post">
@csrf


  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   
  </div>
  <div class="mb-3">
    <label for="exampleInput" class="form-label">Contact number</label>
    <input type="text" class="form-control" id="exampleInputPassword1">
  </div>
  <!-- <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <button type="submit" class="btn btn-primary">Submit</button>

</form>
@endsection