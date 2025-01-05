@extends("layouts.try")
@section("hom-body")
<h2 class="card-title m-4">Add Publisher</h2>
<div class="add_body p-2">

  <form class="row g-3 addform p-2 m-2" action="{{route('publisher.store')}}" method="POST">
    @csrf
    <div class="col-md-4">
      <label for="validationDefaultUsername" class="form-label">Author name</label>
      <div class="input-group">
        <input type="text" name="name" value="{{ old('name') }}"  class="form-control @error('address') is-invalid @enderror" id="validationDefaultUsername"
          aria-describedby="inputGroupPrepend2" required>
        @error('name')
          <p class="invalid-feedback">{{$messages}} </p>
        @enderror


      </div>
    </div>

    <div class="col-md-4">
      <label for="validationDefault01" class="form-label">Address</label>
      <input type="text" name="address" value="{{ old('address') }}"  class="@error('address') is-invalid @enderror form-control" id="validationDefault01" >
      @error('address')
        <p class="invalid-feedback">{{$messages}} </p>
      @enderror
    </div>

    <div class="col-12">
      <button class="btn btn-primary" type="submit">Add Publisher</button>
    </div>
  </form>
</div>

@endsection