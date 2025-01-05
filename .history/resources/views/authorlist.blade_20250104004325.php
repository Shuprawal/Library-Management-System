@extends("layouts.try")

@section("hom-body")
<!-- <div class="container py-4"></div> -->
<div class="list_body p-4">
  <div class="row mb-4">
    <div class="col">
      <h1 class="h3 fw-bold text-primary">Author List</h1>
    </div>
  </div>
  <div class="card table-responsive">
    <div class="card-body">
      

    </div>
    

  </div>

  <div class="my-2">
    <a type="submit" href="{{route('author.create')}}" class="btn btn-dark">Add New</a>
  </div>
</div>
@endsection