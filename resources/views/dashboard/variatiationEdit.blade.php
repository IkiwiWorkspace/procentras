@extends('dashboard.dashboard')
@section('content')
    @foreach ($variations as $item)
        {{$item->name}}
    @endforeach
@endsection