@extends('layout')

@section('content')
    <p><a href="{{ route('home') }}">Back</a></p>

    <h2>{{ $ad->title }}</h2>
    <p>{{ $ad->user->username }}</p>
    <p>{{ $ad->created_at->diffForHumans() }}</p>
    <p>{{ $ad->description }}</p>
@endsection
