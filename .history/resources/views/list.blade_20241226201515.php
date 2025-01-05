@extends('layouts.try')
@section("hom-body")
<div class="all_body">


    
    <div class="p-3 m-0 border-0 bd-example ">
        <h3>All books</h3>
       
        
       

       
        @foreach ($books as $book )
        <div class="card mb-3" style="max-width: auto; background-color:white;">



            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('/img/one.jpg') }}" class="bd-placeholder-img img-fluid rounded-start"
                        width="100%" height="300" focusable="false">
                </div>
                <div class="col-md">
                    <div class="card-body">
                       
                        <h4 class="card-title">{{$book->name}}</h4>
                        @if ($book->authors->isNotEmpty())
                            <h6>Author : {{ $book->authors->pluck('name')->join(', ') }}</h6>
                        @else
                            <em>No authors</em>
                        @endif

                        <p class="card-text">
                            {{ \Illuminate\Support\Str::limit($book->description, 300, '...') }}
                        </p>
                        <p class="card-text"><small class="text-body-secondary">
                        <button type="button" class="btn btn-secondary">Read More</button>


                        </small></p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
       
    </div>

   
</div>

@endsection