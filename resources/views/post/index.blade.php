@extends('layouts.auth')
@include('navbar')
@include('footer')

@section('content')
@foreach ($posts as $post)
<div class="col-md-8 col-md-2 mx-auto">
    <div class="card-wrap">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <a class="no-text-decoration" href="/users/{{ $post->user->id }}">
                    @if ($post->user->profile_photo)
                    <img class="post-profile-icon round-img" src="{{ asset('storage/user_images/' . $post->user->profile_photo) }}">
                    @else
                    <img class="post-profile-icon round-img" src="{{ asset('images/blank_profile.png') }}" >
                    @endif
                </a>
                <a class="black-color no-text-decoration" href="/users/{{ $post->user->id }}">
                    {{ $post->user->name }}
                </a>
            </div>
            <a href="/users/{{ $post->user->id }}">
                <img src="/storage/post_images/{{ $post->id }}.jpg" class="card-img-top">
            </a>
        </div>
    </div>
</div>
@endforeach
@endsection