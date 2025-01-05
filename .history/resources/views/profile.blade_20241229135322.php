@extends('layouts.try');
@section('hom-body')

<div class="profile m-2">
<i class="bi bi-person-circle"></i>
<h1>name={{$profile->user->name}}</h1>
<h1>email={{$profile->user->email}}</h1>
<h1>address={{$profile->address}}</h1>
<h1></h1>
<h1></h1>


Date Of Birth={{$profile->date_of_birth}}
contact number = {{$profile->contact_number}}
</div>
@endsection