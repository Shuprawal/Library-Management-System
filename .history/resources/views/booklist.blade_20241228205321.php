@extends('layouts.try')
@section("hom-body")

<div class="container py-5">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($books as $book)     
        <div class="col">
            <div class="card h-100 border-0 shadow-sm transition-all duration-300 hover:shadow-lg">
                <div class="position-relative">
                    <img src="/img/one.jpg" class="card-img-top object-cover h-64" alt="{{ $book->name }} Cover">
                    @if (($book->available_copies) <= 1)
                        <div class="position-absolute top-0 end-0 m-2">
                            <span class="badge bg-danger px-3 py-2">Not Available</span>
                        </div>
                    @endif
                </div>
                
                <div class="card-body d-flex flex-column gap-2">
                    <h5 class="card-title fw-bold text-primary mb-1">{{$book->name}}</h5>
                    
                    <div class="meta-info text-muted">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark" viewBox="0 0 16 16">
                                <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                            </svg>
                            <span>{{ $book->genres->pluck('name')->join(', ') }}</span>
                        </div>
                        
                        <div class="d-flex align-items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                            </svg>
                            <span>{{ $book->authors->pluck('name')->join(', ') }}</span>
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-transparent border-0 pt-0">
                    <div class="d-flex gap-2">
                        <a href="{{route('book', $book->id)}}" class="btn btn-primary flex-grow-1">
                            Read more
                        </a>
                        @if (($book->available_copies) > 1)
                            <button type="button" class="btn btn-outline-success">
                                Borrow
                            </button>
                        @else
                            <button type="button" class="btn btn-outline-danger" disabled>
                                Not available
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>    
        @endforeach
    </div>
</div>

@endsection