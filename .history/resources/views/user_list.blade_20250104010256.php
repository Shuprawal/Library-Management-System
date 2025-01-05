@extends('layouts.try')
@section('hom-body')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col">
            <h1 class="h3 fw-bold text-primary">User List</h1>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>                            
                            <th scope="col">name</th>
                            <th scope="col">email</th>
                            <th scope="col" class="text-end">edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-end">
                            <form action="{{route('author_edit', $author->id)}}" method="POST" style="display:inline;">
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
            </div>
        </div>
    </div>
</div>


@endsection