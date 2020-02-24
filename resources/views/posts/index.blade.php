@extends('layouts.app')

@section('content')
   @foreach($posts as $post)
       <a href="/profile/{{$post->user->id}}">

       <div class="container">
           <div class="row">
               <div class="col-6 offset-2">
                   <img src="/storage/{{$post->image}}" class="img-responsive img-fluid">
               </div>
               <div class="col-6 offset-2 pt-2 pb-5">
                   <div class="d-flex align-items-baseline">
                       <h4 class="pr-0"><span class="pr-2"><img class=" rounded-circle img-fluid " height="30" width="30" src="/storage/{{$post->user->profile->image}} " ></span>{{$post->user->username}} </h4>
                       <h6 class="pl-3"><a href="#">Follow</a></h6>

                   </div>

                   <p>{{$post->title}}</p>
                   <hr>
               </div>
           </div>
       </div>
       </a>

   @endforeach

   <div class="row col-12 -flex justify-content-center">
       {{$posts->links()}}
   </div>
@endsection
