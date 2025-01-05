@extends("layouts.try")
@section("hom-body")
<h2 class="card-title m-4">Add user</h2>
<div class="add_body p-2">

<form class="row g-3 addform p-2 m-2">

    <div class="col-md-4">
        <label for="validationDefaultUsername" class="form-label">Username</label>
        <div class="input-group">
            <span class="input-group-text" id="inputGroupPrepend2">@</span>
            <input type="text" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
        </div>
    </div>

  <div class="col-md-4">
    <label for="validationDefault01" class="form-label">Email</label>
    <input type="Email" class="form-control" id="validationDefault01"  required>
  </div>
  <div class="col-md-4">
    <label for="validationDefault02" class="form-label">Address</label>
    <input type="text" class="form-control" id="validationDefault02"  required>
  </div>
 
  <div class="col-md-4">
    <label for="validationDefault03" class="form-label">Password</label>
    <input type="password" class="form-control" id="validationDefault03" required>
  </div>

  <div class="col-md-4">
    <label for="validationDefault03" class="form-label">Confirm Password</label>
    <input type="Password" class="form-control" id="validationDefault03" required>
  </div>

  <div class="col-md-4">
    <label for="validationDefault03" class="form-label">City</label>
    <input type="text" class="form-control" id="validationDefault03" required>
  </div>
  
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
      <label class="form-check-label" for="invalidCheck2">
        Agree to terms and conditions
      </label>
    </div>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Register</button>
  </div>
</form>
</div>

@endsection