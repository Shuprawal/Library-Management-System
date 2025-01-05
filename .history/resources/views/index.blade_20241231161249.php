@extends('layouts.try')
@section("hom-body")
<div class="homebox">
    <div class="container-fluid py-5 bg-light">
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="container">
                    <div class="row g-5 align-items-center">
                        <!-- Image Section -->
                        <div class="col-md-6">
                            <div class="position-relative">
                                <img src="{{ asset('/img/one.jpg') }}" class="rounded-3 shadow-lg img-fluid" alt="Book Cover"
                                    style="object-fit: cover; height: 400px; width: 100%;">
                            </div>
                        </div>
                        
                        <!-- Content Section -->
                        <div class="col-md-6">
                            <div class="pe-lg-5">
                                <h6 class="text-primary text-uppercase mb-3">Featured Book</h6>
                                <h2 class="display-6 fw-bold mb-3">Book one The book called xyz abc</h2>
                                
                                <div class="mb-4">            
                                    <h5 class="fw-bold mb-1">Author name</h5>
                                    <p class="text-muted mb-0">Published: <span class="text-body-secondary">March 2024</span></p>                                   
                                </div>
                                
                                <p class="lead mb-4">This is the description for the first slide. You can add more details here as needed. 
                                   This is the description for the first slide. You can add more details here as needed. 
                                   This is the description for the first slide.</p>
                                
                                <div class="d-flex gap-3">
                                    <button class="btn btn-primary btn-lg px-4">
                                        Read More
                                    </button>
                                    <button class="btn btn-outline-primary btn-lg px-4">
                                        Borrow Now
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-item active">
                <div class="container">
                    <div class="row g-5 align-items-center">
                        <!-- Image Section -->
                        <div class="col-md-6">
                            <div class="position-relative">
                                <img src="{{ asset('/img/one.jpg') }}" class="rounded-3 shadow-lg img-fluid" alt="Book Cover"
                                    style="object-fit: cover; height: 400px; width: 100%;">
                            </div>
                        </div>
                        
                        <!-- Content Section -->
                        <div class="col-md-6">
                            <div class="pe-lg-5">
                                <h6 class="text-primary text-uppercase mb-3">Featured Book</h6>
                                <h2 class="display-6 fw-bold mb-3">Book one The book called xyz abc</h2>
                                
                                <div class="mb-4">            
                                    <h5 class="fw-bold mb-1">Author name</h5>
                                    <p class="text-muted mb-0">Published: <span class="text-body-secondary">March 2024</span></p>                                   
                                </div>
                                
                                <p class="lead mb-4">This is the description for the first slide. You can add more details here as needed. 
                                   This is the description for the first slide. You can add more details here as needed. 
                                   This is the description for the first slide.</p>
                                
                                <div class="d-flex gap-3">
                                    <button class="btn btn-primary btn-lg px-4">
                                        Read More
                                    </button>
                                    <button class="btn btn-outline-primary btn-lg px-4">
                                        Borrow Now
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        <!-- Improved Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

        
    </div>
</div>
        <br>


        <h3 class="fw-bold text-primary">Available books</h3>
        

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach($books->take(4) as $book)
            <div class="col">
                <div class="card h-100 shadow-sm hover-shadow">
                    <img src="{{ asset('storage/' .$book->image) }}" class="card-img-top" alt="Book Cover" style="max-height: 300px;">
                    @if (($book->available_copies) < 1)
                        <div class="position-absolute top-0 end-0 m-2">
                            <span class="badge  px-3 py-2">Not Available</span>
                        </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{$book->name}}</h5>
                        <h6 class="card-title text-light badge text-wrap" style="display:inline;">Author:</h6> <h6 style="display:inline;">{{ $book->authors->pluck('name')->join(', ') }}</h6>
                    </div>
                    <div class="card-footer bg-transparent">
                    <a type="button" class="btn btn-primary" href="{{route('book', $book->id)}}">Read more</a>
                    @if (($book->available_copies) > 1)
                    <button type="button" class="btn btn-outline-success">Borrow</button>
                    @else
                    <button type="button" class="btn  btn-outline-danger" disabled>Not available</button>
                    @endif
                    
                    </div>
                </div>
            </div>
            @endforeach
        </div>





        <div class="container py-5">
    <div class="row g-4 text-center">
        <div class="col-md-3">
            <div class="p-4 bg-primary bg-opacity-10 rounded-3">
                <i class="bi bi-book fs-1 text-primary mb-2"></i>
                <h3 class="fw-bold">1,234</h3>
                <p class="mb-0">Total Books</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="p-4 bg-success bg-opacity-10 rounded-3">
                <i class="bi bi-people fs-1 text-success mb-2"></i>
                <h3 class="fw-bold">567</h3>
                <p class="mb-0">Active Members</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="p-4 bg-info bg-opacity-10 rounded-3">
                <i class="bi bi-journal-check fs-1 text-info mb-2"></i>
                <h3 class="fw-bold">890</h3>
                <p class="mb-0">Books Borrowed</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="p-4 bg-warning bg-opacity-10 rounded-3">
                <i class="bi bi-person-lines-fill fs-1 text-warning mb-2"></i>
                <h3 class="fw-bold">123</h3>
                <p class="mb-0">Authors</p>
            </div>
        </div>
    </div>
</div>






<div class="container-fluid bg-light py-4 mb-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form class="row g-3">
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="Search books...">
                        </div>
                        <div class="col-md-3">
                            <select class="form-select">
                                <option>All Categories</option>
                                <option>Fiction</option>
                                <option>Non-Fiction</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select">
                                <option>All Authors</option>
                                <!-- Add authors dynamically -->
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary w-100">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>









    </div>
</div>

<style>
    .badge {
    padding: 0.5em 1em;
    border-radius: 6px;
    background-color: #495057;
    }

    .hover-shadow {
        transition: transform 0.2s ease;
    }

    .hover-shadow:hover {
        transform: translateY(-5px);
    }
</style>
@endsection