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



    <div class="row mb-2  my-4">
        <div class="col">
            <h1 class="h3 text-primary fw-bold">Borrwed Books</h1>
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
                            <th scope="col">Request</th>
                            <th scope="col" class="text-end">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($acceptedRequests as $borrow)
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