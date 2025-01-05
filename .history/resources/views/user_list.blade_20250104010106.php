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
                            <th scope="col">Request Date</th>
                            <th scope="col" class="text-end">Request</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pendingRequests as $borrow)
                        <tr>
                            
                            <td>{{ $borrow->book->name }}</td>
                            <td>{{ $borrow->created_at->format('M d, Y') }}</td>
                            <td class="text-end">
                            {{ $borrow->request}}
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