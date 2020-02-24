@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/post" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-8 offset-2">
            <div class="row"><h2>Add new post</h2></div>
            <div class="form-group row">
                <label for="title" class="col-form-label ">Post Caption</label>

                <input id="username" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" >
                @error('title')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
                @enderror
            </div>
            <div class="row">
                <div >Add Image</div>
                <input type="file" class="form-control-file pt-1" id="image" name="image">

                @error('image')
                <strong style="color: red">{{ $message }}</strong>
                @enderror
            </div>
            <div class="row pt-5">
                <button class="btn btn-primary">Add new post</button>
            </div>
        </div>
    </form>
</div>
@endsection
