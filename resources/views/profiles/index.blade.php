@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 p-5">
            @if($user->profile->image != null)
                <img class="rounded-circle img-thumbnail img-fluid" src="/storage/{{ $user->profile->image}}">
                @else
                <img class="rounded-circle  img-fluid img-thumbnail" src="https://www.cloudraxak.com/wp-content/uploads/2017/03/profile-pic-placeholder.png" height="300", width="300">
            @endif

        </div>
        <div class="col-md-9 p-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex pb-3">
                    <div class="h4">{{ $user->username }}</div>
                    @if(auth()->user()->id != $user->id)
                        <form action="/profile/{{$user->id}}" method="POST">
                            @csrf
                            <button class="btn btn-primary ml-4">{{$follows == true ? 'Unfollow':'Follow'}}</button>
                        </form>
                    @endif

                </div>

                @can('update', $user->profile)
                    <div><a href="/post/create">Add new post</a></div>
                @endcan
            </div>
            @can('update', $user->profile)
                <div><a href="/profile/{{$user->id}}/edit">Edit profile</a></div>
            @endcan
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $postsCount}}</strong> posts</div>
                <div class="pr-5"><strong>{{$followersCount}}</strong> followers</div>
                <div class="pr-5"><strong>{{$followingCount}}</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title ?? '' }}</div>
            <div>{{ $user->profile->bio ?? '' }}</div>
            <div><a href="">{{ $user->profile->url ?? '' }}</a></div>
        </div>
    </div>
    <div class="row pt-5 ">
        @foreach($user->posts as $post)
            <div class="col-4 pb-5">
               <a href="/post/{{$post->id}}"><img src="/storage/{{ $post->image }}" class="w-100"></a>
            </div>
            @endforeach

    </div>
</div>
@endsection
