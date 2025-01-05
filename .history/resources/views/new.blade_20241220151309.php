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


 
</div>

@endsection