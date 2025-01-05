@extends('layouts.try')
@section("hom-body")

<div class="container py-5">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        h
        @foreach($books as $book)     
        <div class="col">
            <div class="card h-100 border-0 hover-shadow shadow-sm transition-all duration-300 hover:shadow">
                <div class="position-relative">
                    <img src="{{ asset('storage/' .$book->image) }}" class="card-img-top object-cover h-80" alt="{{ $book->name }} Cover" style="max-height: 450px;">
                    @if (($book->available_copies) <= 1)
                        <div class="position-absolute top-0 end-0 m-2">
                            <span class="badge bg-danger px-3 py-2">Not Available</span>
                        </div>
                    @endif
                </div>
                
                <div class="card-body d-flex flex-column gap-2">
                    <h5 class="card-title fw-bold  mb-1">{{$book->name}}</h5>
                    
                    <div class="meta-info text-muted">
                        <div class="d-flex align-items-center gap-2 mb-2">

                          
                            <span class="badge text-wrap" >Genre:</span><span>{{ $book->genres->pluck('name')->join(', ') }}</span>
                        </div>
                        
                        <div class="d-flex align-items-center gap-2">
                            
                            <span class="badge text-wrap">Author:</span><span></span>{{ $book->authors->pluck('name')->join(', ') }}</span>
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
<style>
    .hover-shadow {
    transition: transform 0.2s ease;
}

.hover-shadow:hover {
    transform: translateY(-5px);
}  
.badge {
    padding: 0.5em 1em;
    border-radius: 6px;
    background-color: #495057;
}
</style>
@endsection