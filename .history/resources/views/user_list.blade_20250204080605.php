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
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col" class="text-end">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-end">
                            <form action="{{route('delete_user', $user->id)}}" method="POST" style="display:inline;"
                            onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('Delete')
                                <button type="submit" class="btn btn-danger btn-lg">
                                    <i class="bi bi-trash3"></i> Delete
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

<div class="d-flex justify-content-center mt-4">
        {{ $user->links('pagination::bootstrap-4') }}
    </div>


@endsection