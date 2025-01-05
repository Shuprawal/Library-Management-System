@extends("layouts.try")
@section("hom-body")
<h2 class="card-title m-4">Edit Author</h2>
<div class="add_body p-2">

<form class="row g-3 addform p-2 m-2" action={{route('author_update')}} method="POST">
@method('')
@csrf
    <div class="col-md-4">
        <label for="validationDefaultUsername" class="form-label">Author name</label>
        <div class="input-group">
            <input type="text" name ="name" value="{{old('name'),$author->name}}" class="form-control  @error('name') is-invalid @enderror " id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
            @error('name')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
        </div>
    </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Edit Author</button>
  </div>
</form>
</div>

@endsection