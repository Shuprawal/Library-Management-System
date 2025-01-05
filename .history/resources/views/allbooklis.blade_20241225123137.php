@extends("layouts.try")
@section("hom-body")
<div class="list_body p-4">
    <h1>Book list</h1>
    <table class="table table-hover table-striped-columns">
        <thead>
            <tr>
                <!-- Book list -->
                <th scope="col">Book name</th>
                <th scope="col">Author</th>
                <th scope="col">Publisher</th>
                <th scope="col">Genre</th>
                <th scope="col">Available Copies</th>
                <th scope="col">edit</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($books as $book)
                <tr>
                    <td>{{$book->name}}</td>
                    @foreach ($authors as $author )
                    
                    @endforeach
                    <td>{{$author->name}}</td>
                    <td>abc</td>
                    <td>abhhhhhhh</td>
                    <td>abhhhhhhh</td>
                    <td><button type="button" class="btn btn-danger btn-lg">
                            <i class="bi bi-trash3"></i>
                            Delete</button>
                        <button type="button" class="btn btn-dark btn-lg"><i class="bi bi-pencil-square"></i>Edit</button>
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>


    <button type="submit" class="btn btn-dark">Add new </button>
</div>

@endsection