@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/profile/{{$user->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="col-md-8 offset-2">
                <div class="row"><h2>Edit Profile</h2></div>
                <div class="form-group row">
                    <label for="title" class="col-form-label ">Title</label>
                    <input id="username" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $user->profile->title ?? '' }}" >
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="bio" class="col-form-label ">bio</label>
                    <input id="bio" type="bio" class="form-control @error('bio') is-invalid @enderror" name="bio" value="{{ old('bio') ?? $user->profile->bio ?? ''}}" >
                    @error('bio')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="url" class="col-form-label ">Url</label>
                    <input id="url" type="url" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') ?? $user->profile->url ?? ''}}" >
                    @error('url')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
                    @enderror
                </div>
                <div class="row">
                    <div >Profile Image</div>
                    <input type="file" class="form-control-file pt-1" id="image" name="image">
                    @error('image')
                    <strong style="color: red">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="row pt-5">
                    <button class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection
