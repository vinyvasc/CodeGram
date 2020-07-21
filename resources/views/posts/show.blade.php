@extends('layouts.app')

@section('content')
<div class="container" style="width: 70%">
  <div class="row">
    <div class="col-md-9">
      <img src="/storage/{{$post->image}}" height="600" width="600" alt="">
    </div>
    <div class="col-md-3">
      <h3>{{$post->user->username}}</h3>
      <p>{{$post->caption}}</p>
    </div>
  </div>

@endsection
