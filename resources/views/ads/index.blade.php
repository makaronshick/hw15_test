@extends('layout')

@section('content')
    @auth
        <p><a href="{{ route('ads.create') }}">Create Ad</a></p>
    @endauth

    @foreach($ads as $ad)
        <h2><a href="{{ route('ads.show', $ad->id) }}">{{ $ad->title }}</a></h2>

        @if(\Illuminate\Support\Facades\Auth::id() == $ad->user_id)
            <ul>
                <li><a href="{{ route('ads.create', $ad->id) }}">Edit</a></li>
                <li><a href="{{ route('ads.delete', $ad->id) }}">Delete</a></li>
            </ul>
        @endif

        <p>{{ $ad->user->username }}</p>
        <p>{{ $ad->created_at->diffForHumans() }}</p>
        <p>{{ $ad->description }}</p>
    @endforeach

    {{ $ads->links() }}
@endsection
