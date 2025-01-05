@extends('layouts.try')
@section("hom-body")
<div class="homebox">
    <div class="p-3 m-0 border-0 bd-example">

        <!-- Combined Carousel Code -->
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="row">
                        <!-- Image Section -->
                        <div class="col-md-6 imgcarou">
                            <img src="{{ asset('/img/one.jpg') }}" class="bd-placeholder-img img-fluid rounded-start"
                                width="100%" height="300" focusable="false">
                        </div>
                        <!-- Text Section -->
                        <div class="col-md-5 d-flex align-items-center">
                            <div class="imgbodtext">
                                <h1 class=" img-text card-title">Book one The book called xyz abc</h1>
                                <div class="card-body img-text img-description">

                                    <h3 class="card-title">Author name</h3>
                                    <p class="card-text">This is the description for the first slide. You can add more
                                        details here as needed.This is the description for the first slide. You can add
                                        more
                                        details here as needed.This is the description for the first slide. You can add
                                        more
                                        details here as needed.</p>
                                    <p class="card-text"><small class="text-body-secondary">I might write date</small>
                                    </p>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->

                <div class="carousel-item active">
                    <div class="row">
                        <!-- Image Section -->
                        <div class="col-md-6 imgcarou">
                            <img src="{{ asset('/img/one.jpg') }}" class="bd-placeholder-img img-fluid rounded-start"
                                width="100%" height="300" focusable="false">
                        </div>
                        <!-- Text Section -->
                        <div class="col-md-5 d-flex align-items-center">
                            <div class="imgbodtext">
                                <h1 class=" img-text card-title">Book one The book called xyz abc</h1>
                                <div class="card-body img-text img-description">

                                    <h3 class="card-title">Author name</h3>
                                    <p class="card-text">This is the description for the first slide. You can add more
                                        details here as needed.This is the description for the first slide. You can add
                                        more
                                        details here as needed.This is the description for the first slide. You can add
                                        more
                                        details here as needed.</p>
                                    <p class="card-text"><small class="text-body-secondary">I might write date</small>
                                    </p>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <!--  -->
            </div>
            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <br>

        <h3>Available books</h3>
        

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach($books->take() as $book)
            <div class="col">
                <div class="card h-100 shadow-sm hover-shadow">
                    <img src="/img/one.jpg" class="card-img-top" alt="Book Cover">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{$book->name}}</h5>
                        <h6 class="card-title">Author: {{ $book->authors->pluck('name')->join(', ') }}</h6>
                    </div>
                    <div class="card-footer bg-transparent">
                    <a type="button" class="btn btn-outline-dark" href="{{route('book',$book->id)}}">Read more</a>
                    @if (($book->available_copies)>1)
                    <button type="button" class="btn btn-outline-danger">Borrow</button>
                    @else
                    <button type="button" class="btn  btn-outline-danger" disabled>Not available</button>
                    @endif
                    
                    </div>
                </div>
            </div>
            @endforeach
        </div>


        <br>

        <h3>Comedy</h3>
        <div class="card-group">
            <div class="card available-list">
                <img src="/img/one.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Book name</h5>

                </div>
                <div class="card-footer">
                    <small class="text-body-secondary">Last updated 3 mins ago</small>
                </div>
            </div>
            <div class="card available-list">
                <img src="/img/one.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Book name</h5>

                </div>
                <div class="card-footer">
                    <small class="text-body-secondary">Last updated 3 mins ago</small>
                </div>
            </div>
            <div class="card available-list">
                <img src="/img/one.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Book name</h5>

                </div>
                <div class="card-footer">
                    <small class="text-body-secondary">Last updated 3 mins ago</small>
                </div>
            </div>
            <div class="card available-list">
                <img src="/img/one.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Book name</h5>

                </div>
                <div class="card-footer">
                    <small class="text-body-secondary">Last updated 3 mins ago</small>
                </div>
            </div>

        </div>


    </div>
</div>
@endsection