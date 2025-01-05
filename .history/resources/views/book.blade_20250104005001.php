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
                <img src="{{ asset('storage/' . $book->image) }}" class="img-fluid w-100 h-100 object-fit-cover"
                    alt="Book Cover">
            </div>

            <div class="col my-2">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="fw-bold mb-3">{{ $book->name }}</h5>
                        <div  class="rating-container">
                            <!-- <form action="{{route('rate',['type' => 'book', 'id' => $book->id])}}"   method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" name="rating" value="1" class="star">★</button>
                            </form>
                            <form action="{{route('rate',['type' => 'book', 'id' => $book->id])}}" class="star" value="2" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" name="rating" value="2" class="star">★</button>
                            </form>
                            <form action="{{route('rate',['type' => 'book', 'id' => $book->id])}}" class="star" value="3" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" name="rating" value="3" class="star">★</button>
                            </form>
                            <form action="{{route('rate',['type' => 'book', 'id' => $book->id])}}" class="star" value="4" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" name="rating" value="4" class="star">★</button>
                            </form>
                            <form action="{{route('rate',['type' => 'book', 'id' => $book->id])}}" class="star" value="5" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" name="rating" value="5" class="star">★</button>
                            </form> -->
                            @for ($i=1;$i<=5;$i++)
                            <form action="{{route('rate',['type' => 'book', 'id' => $book->id])}}" class="star" value="5" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" name="rating" value="{{$i}}" class="star">★</button>
                            </form>
                            @endfor
                           
                        </div>
                        <p class="mt-2 mb-0">Book Average Rating: {{ round($book->averageRating()) }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7 col-lg-8">
            <div class="book-details bg-white p-4 rounded shadow-sm">
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
                                <p class="mb-0">{{$book->published_date}}</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="metadata-card h-100 p-3 rounded bg-light">
                                <h6 class="fw-bold text-primary mb-2">Pages</h6>
                                <p class="mb-0">{{$book->total_pages}}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Genre Tags -->
                <div class="genre-tags mb-4 d-flex gap-1">
                    <h6 class="fw-bold text-primary mb-2">Genre:</h6>
                    <div class="d-flex gap-2 flex-wrap">

                        @foreach ($book->genres as $genre)
                            <span class="badge bg-secondary">{{ $genre->name }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="genre-tags mb-4 d-flex gap-1">
                    <h6 class="fw-bold text-primary mb-2">Language:</h6>
                    <div class="d-flex gap-2 flex-wrap">

                        @foreach ($book->genres as $genre)
                            <span class="badge bg-secondary">{{ $book->language }}</span>
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
                    
                    @if (Auth::check() && Auth::user()->isAdmin())
                        <form action="{{route('book_edit', $book->id)}}" method="POST" style="display:inline">
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

                        <form action="{{route('book_feature', $book)}}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-primary me-2">
                                <i class="bi bi-book me-2"></i>Feature
                            </button>

                        </form>
                    @else
                        <form action="{{route('book_borrow', $book)}}" method="POST" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-primary me-2">
                            <i class="bi bi-check-circle"> </i>Borrow
                            </button>

                        </form>

                        <form action="{{route('wishlist', $book->id)}}" method="POST" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-secondary">
                                <i class="bi bi-bookmark-plus"></i> Add to Wishlist
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
                    <form class="needs-validation" novalidate method="POST" action="{{route('addReview', $book->id)}}">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="review" class="form-control" placeholder="Write a comment..."
                                required>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-send-fill me-2"></i>Submit
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Previous Comments -->
                <div class="previous-comments">
                    <h6 class="fw-bold text-primary mb-3">Previous Comments</h6>
                    <div class="comment-list">

                        @foreach ($reviews as $review)
                            <div class="comment-item bg-light p-3 mb-3 rounded">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-person-circle me-2"></i>
                                    <strong>{{$review->user->name}}</strong>

                                    @if ($review->user->id == auth()->id())
                                        <div class="ms-auto">
                                            <form action="{{route('delete_review', $review->id)}}" method="POST">
                                                @csrf
                                                @method('Delete')
                                                <button type="submit" class="btn text-danger">
                                                    <i class="bi bi-trash"></i> Delete
                                                </button>
                                            </form>

                                        </div>
                                    @endif
                                </div>
                                <p class="mb-0">{{$review->review}}</p>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rate d-flex gap-4 m-2">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="fw-bold mb-3">Author Rating</h5>
                    @foreach ($book->authors as $author)
                        <div class="mb-3 border-bottom">
                            <p class="fw-semibold mb-2">{{$author->name}}</p>
                            <div class="rating-container">
                                @for ($i=1;$i<=5;$i++)
                                <form action="{{route('rate',['type'=>'author','id'=>$author->id])}}" method="POST" style="display:inline-block;">
                                    @csrf
                                <button type="submit" name="rating" value="{{$i}}" class="star">★</button>
                                </form>
                                
                                @endfor
                            </div>
                            <p class="mt-2 mb-0">Author Average Rating: {{ round($author->averageRating()) }}</p>
                        </div>
                        
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Publisher Rating -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="fw-bold mb-4">Publisher Rating</h5>
                    <p class="fw-semibold mb-3">{{$book->publisher->name}}</p>
                    <div class="rating-container">
                        @for ($i=1;$i<=5;$i++)
                        <form action="{{route('rate',['type'=>'publisher','id'=>$book->publisher->id])}}" method="POST" style="display:inline-block;">
                        @csrf
                        <button type="submit" name="rating" value="{{$i}}" class="star">★</button>
                        </form>
                        @endfor
                        
                    </div>
                    <p class="mt-2 mb-0">Publisher Average Rating: {{ round($book->publisher->averageRating()) }}</p>
                    
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
                    <img src="{{ asset('storage/' . $morebook->image) }}" class="card-img-top" alt="Book Cover">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{$morebook->name}}</h5>
                        <h6 class="card-title badge text-wrap" style="display:inline;">Author:</h6>
                        <h6 style="display:inline;"></h6> {{ $morebook->authors->pluck('name')->join(', ') }}</h6>
                    </div>
                    <div class="card-footer bg-transparent">
                        <a type="submit" class="btn btn-primary" style="display:inline-block;" href="{{route('book', $morebook->id)}}">Read more</a>
                        
                        <form action="{{route('wishlist',$book->id)}}" method="POST" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-secondary" style="display:inline;">
                                <i class="bi bi-bookmark-plus"> </i>Wishlist
                            </button>
                        </form>
                      

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
        border: 1px solid rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease;
    }

    .metadata-card:hover {
        transform: translateY(-2px);
    }


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


    .star {
        cursor: pointer;
        color: #FFD700;
        font-size: 24px;
        border: none;
        background-color: white;
    }

    .star:hover {
        color: #FFC107;
    }
</style>



@endsection