@extends("layouts.try")

@section("hom-body")
<div class="list_body p-4">
  <h1>Genre List</h1>
  <table class="table table-hover table-striped-columns">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <!-- <th scope="col">Email</th> -->
        <th scope="col">Edit</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      @foreach($genres as $genre)
      <tr>
        <td>{{ $genre->name }}</td>

        <td>
          <form action="{{route('delete_genre',$genre->id)}}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this genre?');">
            @csrf
            @method('Delete')
          <button type="submit" class="btn btn-danger btn-lg">
            <i class="bi bi-trash3"></i> Delete
          </button>
          </form>
          
          <form action="{{route('genre_edit')}}" method="POST" style="display:inline;">
          <button type="submit" class="btn btn-dark btn-lg">
            <i class="bi bi-pencil-square"></i> Edit
          </button>
          </form>
          
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <a type="submit" href="{{route('genre.create')}}" class="btn btn-dark">Add New</a>
</div>
@endsection
