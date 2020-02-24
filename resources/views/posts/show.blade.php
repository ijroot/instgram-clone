@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="/storage/{{$post->image}}" class="img-responsive img-fluid">
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-baseline">
                    <h4 class="pr-0"><span class="pr-2"><img class=" rounded-circle img-fluid " height="50" width="50" src="/storage/{{$post->user->profile->image}} " ></span>{{$post->user->username}} </h4>
                    <h6 class="pl-3"><a href="#">Follow</a></h6>

                </div>
                <hr>
                <p>{{$post->title}}</p>
            </div>
        </div>
    </div>
@endsection
