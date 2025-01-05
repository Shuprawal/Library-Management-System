@extends('layouts.try')
@section('hom-body')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col">
            <h1 class="h3 fw-bold text-primary">Borrow Requests</h1>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>                            
                            <th scope="col">Book</th>
                            <th scope="col">Request Date</th>
                            <th scope="col" class="text-end">status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pendingRequests as $borrow)
                        <tr>
                            
                            <td>{{ $borrow->book->name }}</td>
                            <td>{{ $borrow->created_at->format('M d, Y') }}</td>
                            <td class="text-end">
                            {{ $borrow->request}}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">
                                <div class="text-center py-4">
                                    <i class="bi bi-inbox fs-1 text-muted"></i>
                                    <h6 class="mt-3">No Pending Requests</h6>
                                    <p class="text-muted">There are currently no pending book requests to review.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <div class="row mb-4">
        <div class="col">
            <h1 class="h3">Borr</h1>
            <p class="text-muted">Manage pending book requests from users</p>
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
                            <th scope="col" class="text-end">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($acceptedRequests as $borrow)
                        <tr>
                            
                            <td>{{ $borrow->book->name }}</td>                            
                            <td>{{ $borrow->borrow_date}}</td>
                            <td class="text-end">{{ $borrow->status }}</td>
                            
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">
                                <div class="text-center py-4">
                                    <i class="bi bi-inbox fs-1 text-muted"></i>
                                    <h6 class="mt-3">No Pending Requests</h6>
                                    <p class="text-muted">There are currently no pending book requests to review.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection