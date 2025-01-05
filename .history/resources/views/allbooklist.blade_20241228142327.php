@extends("layouts.try")
@section("hom-body")
<div class="list_body p-4">
    <h1>Book List</h1>
    <table class="table table-hover table-striped-columns">
        <thead>
            <tr>
                <th scope="col">Book Name</th>
                <th scope="col">Author(s)</th>
                <th scope="col">Publisher</th>
                <th scope="col">Genre(s)</th>
                <th scope="col">Available Copies</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($books as $book)
                <tr>
                    <!-- Book Name -->
                    <td>{{ $book->name }}</td>

                    <!-- Authors -->
                    <td>
                        @if ($book->authors->isNotEmpty())
                            {{ $book->authors->pluck('name')->join(', ') }}
                        @else
                            <em>No authors</em>
                        @endif
                    </td>

                    <!-- Publisher -->
                    <td>
                        {{ $book->publisher->name ?? 'No publisher' }}
                    </td>

                    <!-- Genres -->
                    <td>
                        @if ($book->genres->isNotEmpty())
                            {{ $book->genres->pluck('name')->join(', ') }}
                        @else
                            <em>No genres</em>
                        @endif
                    </td>

                    <!-- Available Copies -->
                    <td>{{ $book->available_copies }}</td>

                    <!-- Action Buttons -->
                    <td>
                        <form action="{{ route('delete_book', $book->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash3"></i> Delete
                            </button>
                        </form>
                       
                        <form action="{{route('book_edit',$book->id)}}" method="POST" 
                            @csrf
                            <a  class="btn btn-dark btn-sm">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                        </form>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('book.create') }}" class="btn btn-dark mt-3">Add New Book</a>
</div>
@endsection
