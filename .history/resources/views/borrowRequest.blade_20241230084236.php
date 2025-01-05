@extends('layouts.try');
@section('hom-body')
<table>
    <thead>
        <tr>
            <th>User</th>
            <th>Book</th>
            <th>Request Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pendingRequests as $borrow)
        <tr>
            <td>{{ $borrow->user->name }}</td>
            <td>{{ $borrow->book->title }}</td>
            <td>{{ $borrow->created_at->format('d-m-Y') }}</td>
            <td>
                <form action="{{ route('borrowe', $borrow) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success">Approve</button>
                </form>

                <form action="{{ route('borrows.deny', $borrow) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-danger">Deny</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection