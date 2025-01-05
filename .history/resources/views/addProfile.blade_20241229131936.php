@extends('layouts.try');
@section('hom-body')

<form action="{{route('profilecreate')}}" method="Post" class="m-3 p-5">
@csrf
<h3 class="fw-bold text-primary" >Create Profile</h3>
  <div class="mb-3">
    <label for="exampleAddress" class="form-label">address</label>
    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="exampleInputAddress1">
    @error('address')
        <p class="invalid-feedback">{{ $message }}</p>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputContact" class="form-label">Contact number</label>
    <input type="text" name="contact_number" class="form-control @error('contact_number') is-invalid @enderror" id="exampleInputContact1">
    @error('address')
        <p class="invalid-feedback">{{ $message }}</p>
    @enderror
    </div>
 
  <div class="mb-3">
    <label for="exampleInputDOB" class="form-label">Date Of Birth</label>
    <input type="date" name="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" id="exampleInputDOB">
</div>


  <button type="submit" class="btn btn-primary">Submit</button>

  <script>
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('exampleInputDOB').setAttribute('max', today);
</script>
</form>
@endsection