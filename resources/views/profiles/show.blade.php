@extends('layouts.app')

@section('content')
<div class="container" style="width: 70%">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <img src="{{ $user->profile->profileImage() }}" class="rounded-circle" style="width: 180px">
        </div>
        <div class="col-9">
            <div class="d-flex align-items-center">
                <h1 class="pr-3">{{$user->username}}</h1>
                @can('update', $user->profile)
                <div class=""><a class="btn btn-outline-dark btn-sm" href="/profile/{{ $user->id }}/edit">Editar perfil</a></div>
                @endcan
                <?php $authUserId = isset(auth()->user()->id)? auth()->user()->id: '' ?>
                @if(isset(auth()->user()->id) && $user->id != $authUserId)
                <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                @endif

            </div>
            <div class="d-flex pb-3">
                <div class="pr-3"><strong>{{ $user->posts->count() }}</strong> publicações</div>
                <div class="pr-3"><strong>{{ $user->profile->followers->count() }}</strong> seguidores</div>
                <div class=""><strong>{{ $user->following->count() }}</strong> seguindo</div>
            </div>
            <div><strong>{{$user->name}}</strong></div>
            <div><p>{{$user->profile->description}}</p></div>
            <div><a href="">{{$user->profile->url}}</strong></a></div>
            @can('update', $user->profile)
            <div><a href="/p/create" class="btn btn-info text-light mt-3">Fazer nova publicação</a></div>
            @endcan
        </div>
    </div>
    <hr>
    <div class="pt-3 row">
        @foreach($user->posts as $post)
        <div class="col-4 mb-4"><a href="/p/{{$post->id}}"><img class="w-100" src="/storage/{{ $post->image }}" alt=""></a></div>
        @endforeach
    </div>
</div>
@endsection
