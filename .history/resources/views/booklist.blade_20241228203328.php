@extends('layouts.try')
@section("hom-body")


<div class="list_body p-3 m-0 border-0 bd-example ">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($books as $book)        
            <div class="col">
                <div class="card h-100 shadow-sm hover-shadow">
                    <img src="/img/one.jpg" class="card-img-top" alt="Book Cover">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{$book->name}}</h5>
                        <h6 class="card-title">Author: {{ $book->authors->pluck('name')->join(', ') }}</h6>
                    </div>
                    <div class="card-footer bg-transparent">
                        <a type="button" class="btn btn-outline-dark" href="{{route('book', $book->id)}}">Read more</a>
                        @if (($book->available_copies) > 1)
                            <button type="button" class="btn btn-outline-danger">Borrow</button>
                        @else
                            <button type="button" class="btn  btn-outline-danger" disabled>Not available</button>
                        @endif

                    </div>
                </div>
        @endforeach
        </div>
    </div>


    @endsection