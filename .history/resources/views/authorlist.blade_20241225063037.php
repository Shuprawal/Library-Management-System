@extends("layouts.try")

@section("hom-body")
<div class="list_body p-4">
  <h1>Author List</h1>
  <table class="table table-hover table-striped-columns">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Edit</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      @foreach($authors as $author)
      <tr>
        <td>{{ $author->name }}</td>
        <td>{{ $author->email }}</td>
        <td>
          <button type="button" class="btn btn-danger btn-lg">
            <i class="bi bi-trash3"></i> Delete
          </button>
          <button type="button" class="btn btn-dark btn-lg">
            <i class="bi bi-pencil-square"></i> Edit
          </button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <button type="submit" href class="btn btn-dark">Add New</button>
</div>
@endsection
