@extends('layouts.app')

@section('content')
<div class="container" style="width: 70%">
@foreach($posts as $post)
    <div class="row pb-5">
        <div class="col-md-8 offset-2">
            <div class="d-block p-3 border" style="border: 1px solid #c8dbda">
                <a href="/profile/{{ $post->user->id}}" style="text-decoration: none; color: #000">
                <img src="{{$post->user->profile->profileImage()}}" width="40" class="rounded-circle">
               
                <h4 class="d-inline-block">{{ $post->user->username }}</h4>
                </a>
            </div>
            <img src="/storage/{{$post->image}}" class="w-100">
            <div class="border" style="border: 1px solid #c8dbda">
                <p><strong>{{ $post->user->username }}</strong> {{ ' ' }} {{ $post->caption }}</p>
            </div>
        </div>
    </div>

    @endforeach 
</div>
@endsection
