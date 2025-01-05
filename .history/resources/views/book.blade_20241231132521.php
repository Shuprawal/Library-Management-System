@extends('layouts.try')
@section("hom-body")
<div class="single-book container py-5">
    <!-- Book Header Section -->
    <div class="book-header mb-4">
        <h2 class="fw-bold text-primary">{{$book->name}}</h2>
    </div>

    <div class="row g-4">
        <!-- Image Section -->
        <div class="col-md-5 col-lg-4 ">
            <div class="book-image-container shadow rounded overflow-hidden">
                <img src="{{ asset('storage/' .$book->image) }}" class="img-fluid w-100 h-100 object-fit-cover" alt="Book Cover"  >
            </div>
        </div>

        <!-- Book Details Section -->
        <div class="col-md-7 col-lg-8">
            <div class="book-details bg-white p-4 rounded shadow-sm">
                <!-- Book Metadata Grid -->
                <div class="book-metadata-grid mb-4">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-3">
                        <div class="col">
                            <div class="metadata-card h-100 p-3 rounded bg-light">
                                <h6 class="fw-bold text-primary mb-2">Author</h6>
                                
                                @foreach ($book->authors as $author)
                                <p class="mb-0">{{$author->name}}</p>

                        @endforeach
                            </div>
                        </div>
                        <div class="col">
                            <div class="metadata-card h-100 p-3 rounded bg-light">
                                <h6 class="fw-bold text-primary mb-2">Publisher</h6>
                              
                                <p class="mb-0">{{$book->publisher->name}}</p>
                                
                            </div>
                        </div>
                        <div class="col">
                            <div class="metadata-card h-100 p-3 rounded bg-light">
                                <h6 class="fw-bold text-primary mb-2">Published Date</h6>
                                <p class="mb-0">Publication Date</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="metadata-card h-100 p-3 rounded bg-light">
                                <h6 class="fw-bold text-primary mb-2">Pages</h6>
                                <p class="mb-0">Total Pages</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Genre Tags -->
                <div class="genre-tags mb-4">
                    <h6 class="fw-bold text-primary mb-2">Genre</h6>
                    <div class="d-flex gap-2 flex-wrap">
                        
                        @foreach ($book->genres as $genre)
                            <span class="badge bg-secondary">{{ $genre->name }}</span>
                        @endforeach
                    </div>
                </div>

                <!-- Description -->
                <div class="book-description mb-4">
                    <h6 class="fw-bold text-primary mb-2">Description</h6>
                    <p class="text-muted">{{$book->description}}</p>
                   
                </div>

                <!-- Action Buttons -->
                <div class="action-buttons">
                    <form action="{{route('book_borrow',$book)}}" method="POST" style="display:inline-block;">
                    @csrf
                    <button type="submit" class="btn btn-primary me-2">
                        <i class="bi bi-book me-2"></i>Borrow
                    </button>
                    <button type="button" class="btn btn-outline-danger">Add to Wishlist</button>
                    </form>
                    @if (Auth::check() && Auth::user()->isAdmin())
                    <form action="{{route('book_edit',$book->id)}}" method="POST" style="display:inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-dark btn-sm">
                                <i class="bi bi-pencil-square"></i> Edit
                    </button>
                    </form>


                    <form action="{{ route('delete_book', $book->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger me-2">
                        <i class="bi bi-trash3 me-2"></i>Delete
                    </button>
                    </form>
                   
                    
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Comments Section -->
    <div class="comments-section mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="fw-bold text-primary mb-4">Comments</h4>
                
                <!-- Comment Form -->
                <div class="comment-form mb-4">
                    
                </div>

                <!-- Previous Comments -->
                <div class="previous-comments">
                    <h6 class="fw-bold text-primary mb-3">Previous Comments</h6>
                    <div class="comment-list">
                        <div class="comment-item mb-3 p-3 bg-light rounded">
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-person-circle fs-4 me-2"></i>
                                <h6 class="mb-0 fw-bold">User Name</h6>
                            </div>
                            <p class="mb-0 text-muted">Comment Text</p>
                        </div>
                        <div class="comment-item mb-3 p-3 bg-light rounded">
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-person-circle fs-4 me-2"></i>
                                <h6 class="mb-0 fw-bold">User Name</h6>
                            </div>
                            <p class="mb-0 text-muted">Comment Text</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recommendations Section -->
    <div class="recommendations-section mt-5">
        <h4 class="fw-bold text-primary mb-4">More by this author</h4>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach($morebooks as $morebook)
            <div class="col">
                <div class="card h-100 shadow-sm hover-shadow">
                    <img src="/img/one.jpg" class="card-img-top" alt="Book Cover">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{$morebook->name}}</h5>
                        <h6 class="card-title badge text-wrap" style="display:inline;">Author:</h6> <h6 style="display:inline;"></h6> {{ $morebook->authors->pluck('name')->join(', ') }}</h6>
                    </div>
                    <div class="card-footer bg-transparent">
                    <a type="button" class="btn btn-primary" href="{{route('book',$book->id)}}">Read more</a>
                    @if (($book->available_copies)>1)
                    <button type="button" class="btn btn-outline-success">Borrow</button>
                    @else
                    <button type="button" class="btn  btn-outline-danger" disabled>Not available</button>
                    @endif
                    
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<style>

.book-image-container {
    aspect-ratio: 2/3;
}

.metadata-card {
    border: 1px solid rgba(0,0,0,0.1);
    transition: transform 0.2s ease;
}

.metadata-card:hover {
    transform: translateY(-2px);
}

/* .comment-item {
    border-left: 3px solid var(--bs-primary);
} */

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

.action-buttons .btn {
    padding: 0.5rem 1.5rem;
}
</style>

@endsection