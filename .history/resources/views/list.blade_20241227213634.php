@extends('layouts.try')
@section("hom-body")
<div class="all_body">
    
    <div class="p-3 m-0 border-0 bd-example ">
        <h3>All books</h3>
       
        @foreach ($books as $book )
        <div class="card mb-3 list_body bg-white rounded shadow-sm" style="max-width: auto; ">

            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{  asset('storage/uploads' .$book->image) }}" 
                    <!-- <img src="{{ $book->image ?? asset('storage/uploads' .$book->image) }}" -->
                    alt="{{ $book->name }}"  class="bd-placeholder-img img-fluid rounded-start"
                        width="100%" height="300" focusable="false">
                </div>
                <div class="col-md">
                    <div class="card-body">
                       
                        <h4 class="card-title fw-bold" style="color:#3498db;">{{$book->name}}</h4>
                        @if ($book->authors->isNotEmpty())
                            <h6>Author : {{ $book->authors->pluck('name')->join(', ') }}</h6>
                        @else
                            <em>No authors</em>
                        @endif

                        <p class="card-text">
                            {{ \Illuminate\Support\Str::limit($book->description, 300, '...') }}
                        </p>
                        <p class="card-text"><small class="text-body-secondary">
                            <a type="button" class="btn btn-outline-dark" href="{{route('book',$book->id)}}">Read more</a> 
                            <button type="button" class="btn btn-outline-danger">Add to Wishlist</button>
                            @if (($book->available_copies)>1)
                            <button type="button" class="btn btn-outline-danger">Borrow</button>
                            @else
                            <button type="button" class="btn  btn-outline-danger" disabled>Not available</button>
                            @endif
                        </small></p>
                    </div>
                </div>
            </div>
        </div>

        @endforeach

        <style>
            .list_body {
                transition: transform 0.2s ease;
            }

            .list_body:hover {
                transform: translateY(-2px);
            }
        </style>
    </div>

   
</div>

@endsection