@extends("layouts.try")
@section("hom-body")
<h2 class="card-title m-4">Add Publisher</h2>
<div class="add_body p-2">

<form class="row g-3 addform p-2 m-2" action="{{route()}}">

    <div class="col-md-4">
        <label for="validationDefaultUsername" class="form-label">Author name</label>
        <div class="input-group">
            <input type="text" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
        </div>
    </div>

  <div class="col-md-4">
    <label for="validationDefault01" class="form-label">Address</label>
    <input type="text" class="form-control" id="validationDefault01"  required>
  </div>
 
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Add Publisher</button>
  </div>
</form>
</div>

@endsection