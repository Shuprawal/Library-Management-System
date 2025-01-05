@extends('layouts.try')
@section("hom-body")
<div class="container py-5">
    <div class="mb-4">
        <h2 class="fw-bold text-primary">Wishlist Collection</h2>
        </div>
    </div>

    <div class="row g-4">
        @foreach ($wishlists as $book)
        <div class="col-12">
            <div class="card hover-shadow border-0 overflow-hidden">
                <div class="row g-0">
                    <div class="col-md-3">
                        <img src="{{ asset('storage/' .$book->image) }}"
                            alt="{{ $book->->name }}"
                            class="img-fluid object-fit-cover h-100 w-100"
                            style="max-height: 250px;">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body p-4">
                            <h3 class="card-title fw-bold text-primary mb-2">{{ $book->name }}</h3>
                            <div class="d-flex align-items-center mb-3">
                                {{--@if ($book->authors->isNotEmpty())
                                    <span class="badge  text-light me-2">Authors:</span>
                                    {{ $book->authors->pluck('name')->join(', ') }}
                                @else
                                    <span class="text-muted fst-italic">No authors listed</span>
                                @endif--}}
                            </div>
                            <p class="card-text mb-4">{{ \Illuminate\Support\Str::limit($book->description, 300, '...') }}</p>
                            <div class="d-flex gap-2 flex-wrap">
                                <a href="{{ route('book', $book->id) }}" 
                                   class="btn btn-primary">
                                    <i class="bi bi-book"></i> Read More
                                </a>
                                <button class="btn btn-outline-danger">
                                     Remove From Wishlist
                                </button>
                                @if (($book->available_copies) > 1)
                                    <button class="btn btn-success">
                                        <i class="bi bi-check-circle"></i> Borrow Now
                                    </button>
                                @else
                                    <button class="btn btn-secondary" disabled>
                                        <i class="bi bi-x-circle"></i> Not Available
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
.hover-shadow {
    transition:  0.3s ease;
    border: 1px solid rgba(0,0,0,0.08);
}

.hover-shadow:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}

.card {
    background-color: whitesmoke;
    border-radius: 12px;
}

.badge {
    padding: 0.5em 1em;
    border-radius: 6px;
    background-color: #495057;
}

.btn {
    padding: 0.5rem 1rem;
    border-radius: 8px;
}



.object-fit-cover {
    object-fit: cover;
}
</style>

<script>
    function sortBooks(option) {
        const url = new URL(window.location.href);
        url.searchParams.set('sort', option);
        window.location.href = url.toString();
    }
</script>

@endsection