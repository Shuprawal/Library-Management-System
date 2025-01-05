@extends('layouts.try')
@section('hom-body')
<div class="container py-4">
    <div class="row mb-2">
        <div class="col">
            <h1 class="h3 fw-bold text-primary">Book Requests</h1>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">User</th>
                            <th scope="col">Book</th>
                            <th scope="col">Request Date</th>
                            <th scope="col">status</th>
                            <th scope="col" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pendingRequests as $borrow)
                            <tr>
                                <td>{{ $borrow->user->name }}</td>
                                <td>{{ $borrow->book->name }}</td>
                                <td>{{ $borrow->created_at->format('M d, Y') }}</td>
                                <td>{{ $borrow->request }}</td>
                                <td>
                                    <div class="d-flex gap-2 justify-content-end">
                                        <form action="{{ route('approve_request', $borrow) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <i class="bi bi-check-lg me-1"></i>
                                                Approve
                                            </button>
                                        </form>

                                        <form action="{{ route('deny_request', $borrow) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bi bi-x-lg me-1"></i>
                                                Deny
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>





    <div class="row mb-2 my-3">
        <div class="col">
            <h1 class="h3 fw-bold text-primary">Accepted Requests</h1>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">User</th>
                            <th scope="col">Book</th>
                            <th scope="col">Status</th>
                            <th scope="col">Borrow Date</th>
                            <th scope="col" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($acceptedRequests as $borrow)
                            <tr>
                                <td>{{ $borrow->user->name }}</td>
                                <td>{{ $borrow->book->name }}</td>
                                <td>{{ $borrow->status }}</td>
                                <td>{{ $borrow->borrow_date}}</td>
                                <td>
                                    <div class="text-end">
                                        <form action="{{ route('book_return', $borrow) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success btn-sm">
                                                Returned
                                            </button>
                                        </form>


                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <div class="row mb-2  my-4">
        <div class="col">
            <h1 class="h3 text-primary fw-bold">Returned Books</h1>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>

                            <th scope="col">Book</th>
                            <th scope="col">Borrow Date</th>
                            <th scope="col">Return Date</th>
                            <th scope="col">Request</th>
                            <th scope="col" class="text-end">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($returnedBooks as $borrow)
                            <tr>
                                <td>{{ $borrow->book->name }}</td>
                                <td>{{ $borrow->borrow_date}}</td>
                                <td>{{ $borrow->request}}</td>
                                <td class="text-end">{{ $borrow->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>







@endsection