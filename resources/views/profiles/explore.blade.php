@extends('layouts.app')

@section('content')
<div class="container" style="width: 70%">
  <form action="/explore" method="get">

    <div class="d-flex justify-content-center">
        <div class="col-md-6">
            <h4>Find people</h4>
            <div class="input-group">
                <div class="input-group-prepend">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
                <input type="text" class="form-control" name="username">
            </div>
      </div>
    </div>
  </form>

    <div class="row justify-content-center">
        <div class="col-md-6">
            @if(isset($whoFollows))
                @foreach($whoFollows as $user)
                    <a href="/profile/{{ $user->id }}" style="text-decoration: none">
                    <div class="p-3 m-2" style="border: 1px solid #c8dbda">
                        <img src="{{ $user->profile->profileImage() }}" class="rounded-circle" width="70">
                        <span class="pl-5">{{ $user->username }}</span>
                        <br>
                        <span style="color: gray">{{ $user->name }}</span>
                    </div>
                    </a>
                @endforeach
            @endif
        </div>
    </div>


</div>
@endsection
