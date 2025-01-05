@extends('layouts.try')
@section('hom-body')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col">
            <h1 class="h3">Book Requests</h1>
            <p class="text-muted">Manage pending book requests from users</p>
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
                            <th scope="col" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pendingRequests as $borrow)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center text-white" style="width: 40px; height: 40px;">
                                        {{ substr($borrow->user->name, 0, 1) }}
                                    </div>
                                    <div class="ms-3">
                                        <div class="fw-semibold">{{ $borrow->user->name }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $borrow->book->name }}</td>
                            <td>{{ $borrow->created_at->format('M d, Y') }}</td>
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
            <h1 class="h3">Accepted Requests</h1>
            <p class="text-muted">Manage pending book requests from users</p>
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
                        @forelse ($acceptedRequests as $borrow)
                        <tr>
                            <td>                                
                                    
                            {{ $borrow->user->name }}</div>
                          
                                
                            </td>
                            <td>{{ $borrow->book->name }}</td>
                            <td>{{ $borrow->status }}</td>
                            <td>{{ $borrow->borrow_date}}</td>
                          
                            <td>
                                <div class="">
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

@push('styles')
<!-- Add Bootstrap Icons -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"> -->
@endpush

@push('scripts')
<script>
    // Add confirmation dialogs
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function(e) {
            const action = this.action.includes('approve') ? 'approve' : 'deny';
            if (!confirm(`Are you sure you want to ${action} this request?`)) {
                e.preventDefault();
            }
        });
    });
</script>
@endpush
@endsection