@extends("layouts.try")

@section("hom-body")
<div class="list_body p-4">
  <div class="row mb-4">
    <div class="col">
      <h1 class="h3 fw-bold text-primary">Publisher List</h1>
    </div>
  </div>
  
  <table class="table table-hover table-striped-columns">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Address</th>
        <th scope="col">Edit</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      @foreach($publishers as $publisher)
      <tr>
        <td>{{ $publisher->name }}</td>
        <td>{{ $publisher->address }}</td>
        <td>
          <form action="{{route('delete_publisher',$publisher->id)}}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this publisher?');">
            @csrf
            @method('Delete')
          <button type="submit" class="btn btn-danger btn-lg">
            <i class="bi bi-trash3"></i> Delete
          </button>
          </form>
          
          <form action="{{route('publisher_edit',$publisher->id)}}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn btn-dark btn-lg">
              <i class="bi bi-pencil-square"></i> Edit
            </button>
          </form>
         
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <a type="submit" href="{{route('publisher.create')}}" class="btn btn-dark">Add New</a>
</div>
@endsection
