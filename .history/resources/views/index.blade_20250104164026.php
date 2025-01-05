@extends('layouts.try')
@section("hom-body")
<div class="homebox">
    <div class="container-fluid py-5 bg-light">
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
            @foreach ($featured as $book)                    
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <div class="container">
                        <div class="row g-2">
                            <div class="col-md-6">
                                <div class="position-relative">
                                    <img src="{{ asset('storage/' . $book->image) }}" class="rounded-3 shadow-lg img-fluid"
                                        alt="Book Cover" style="object-fit: cover; height: 400px; width: 60%;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="pe-lg-5">
                                    <h6 class="text-primary text-uppercase  fw-bold mb-3">Featured Book</h6>
                                    <h2 class="display-6 fw-bold mb-3">{{$book->name}}</h2>

                                    <div class="mb-4">

                                        <p class="text-muted mb-0">Published: <span class="text-body-secondary">{{$book->published_date}}
                                                </span></p>
                                    </div>

                                    <p class="lead mb-4">{{ \Illuminate\Support\Str::limit($book->description, 300, '...') }}</p>

                                    <div class="d-flex gap-3">
                                        <a href="{{ route('book', $book->id) }}" 
                                        class="btn btn-primary btn-lg px-4">
                                            <i class="bi bi-book"></i> Read More
                                        </a>
                                        
                                        @if (Auth::check() && Auth::user()->isAdmin())
                                        <form action="{{route('remove_feature',$book)}}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-outline-danger btn-lg px-4">
                                                Remove Featured 
                                            </button>
                                        </form>
                                        
                                        @else
                                        
                                        <form action="{{route('wishlist', $book->id)}}" method="POST" style="display:inline-block;">
                                            @csrf
                                            <button type="submit" class="btn btn-secondary btn-lg px-4">
                                                <i class="bi bi-bookmark-plus"></i> Add to Wishlist
                                            </button>
                                        </form>
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach


                <!-- Improved Carousel Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                

            </div>
        </div>

        <br>



        <div class="container py-5">
            <div class="row g-4 text-center">
                <div class="col-md-3 hover-shadow">
                    <div class="p-4  bg-black bg-opacity-10 rounded-3 ">
                        <i class="bi bi-book fs-1 "></i>
                        <h3 class="fw-bold">{{$totalbook}}</h3>
                        <p>Total Books</p>
                    </div>
                </div>
                <div class="col-md-3 hover-shadow">
                    <div class="p-4 bg-primary-subtle bg-opacity-10 rounded-3">
                        <i class="bi bi-people fs-1"></i>
                        <h3 class="fw-bold">{{$totalUser}}</h3>
                        <p>Active Members</p>
                    </div>
                </div>
                <div class="col-md-3 hover-shadow">
                    <div class="p-4 bg-info bg-opacity-10 rounded-3">
                        <i class="bi bi-journal-check fs-1 "></i>
                        <h3 class="fw-bold">{{$totalBorrow}}</h3>
                        <p>Books Borrowed</p>
                    </div>
                </div>
                <div class="col-md-3 hover-shadow">
                    <div class="p-4 bg-warning bg-opacity-10 rounded-3">
                        <i class="bi bi-person-lines-fill fs-1"></i>
                        <h3 class="fw-bold">{{$totalAuthor}}</h3>
                        <p>Authors</p>
                    </div>
                </div>
            </div>
        </div>
        <br>



        <h3 class="fw-bold text-primary">Available books</h3>


        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach($books->take(4) as $book)
                <div class="col">
                    <div class="card h-100 shadow-sm hover-shadow">
                        <img src="{{ asset('storage/' . $book->image) }}" class="card-img-top" alt="Book Cover"
                            style="max-height: 300px;">
                        @if (($book->available_copies) < 1)
                            <div class="position-absolute top-0 end-0 m-2">
                                <span class="badge  px-3 py-2">Not Available</span>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{$book->name}}</h5>
                            <h6 class="card-title text-light badge text-wrap" style="display:inline;">Author:</h6>
                            <h6 style="display:inline;">{{ $book->authors->pluck('name')->join(', ') }}</h6>
                        </div>
                        <div class="card-footer bg-transparent">
                            <a type="button" class="btn btn-primary" style="display:inline;" href="{{route('book', $book->id)}}">Read more</a>
                            <form action="{{route('wishlist',$book->id)}}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-secondary" style="display:inline;">
                                    <i class="bi bi-bookmark-plus"></i>Add Wishlist
                                </button>

                                </form>
                            <!-- @if (($book->available_copies) > 1)
                                <button type="button" class="btn btn-outline-success">Borrow</button>
                            @else
                                <button type="button" class="btn  btn-outline-danger" disabled>Not available</button>
                            @endif -->

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>

<style>
    .badge {
        padding: 0.5em 1em;
        border-radius: 6px;
        background-color: #495057;
    }

    .card{
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }

    .hover-shadow {
        transition: transform 0.2s ease;
    }

    .hover-shadow:hover {
        transform: translateY(-5px);
    }
</style>
@endsection