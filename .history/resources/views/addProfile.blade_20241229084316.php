@extends('layouts.try');
@section('hom-body')
<form action="{{route('profilecreate')}}" method="Post">
@csrf


</form>
@endsection