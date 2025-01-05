@extends('layouts.try');
@section('hom-body')

<div class="profile ">
<i class="bi bi-person-circle"></i>
name={{$profile->user->name}}
email={{$profile->user->email}}
address={{$profile->address}}
address={{$profile->date_of_}}

</div>
@endsection