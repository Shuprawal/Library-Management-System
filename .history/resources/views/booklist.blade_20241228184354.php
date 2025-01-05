@extends('layouts.try')
@section("hom-body")
@if (isset($books))

<div class="list_body p-3 m-0 border-0 bd-example ">


    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($books as $book)
        
        
        <div class="col">
            <div class="card">
                <img src="{{ asset('/img/one.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$book->name}}</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>
        @endforeach

    </div>    
</div>
@ifel
<H1>No books found for this genre.</H1>

@endif

@endsection