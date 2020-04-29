@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
      
    </div>
    <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PATCH')
        <div class="row">
            <h2>Edit Profile</h2>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label ">
                        {{ __('Edit Title') }}
                    </label>
                    <input id="title" type="text" class="form-control @error('title') 
                    is-invalid @enderror" name="title" value="{{ old('title') ?? $user->profile->title }}" 
                    autocomplete="title" autofocus>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="desc" class="col-md-4 col-form-label ">
                        {{ __('Edit desc') }}
                    </label>
                    <input id="desc" type="text" class="form-control @error('desc') 
                    is-invalid @enderror" name="desc" value="{{ old('desc') ?? $user->profile->desc }}" 
                    autocomplete="desc" autofocus>
                    @error('desc')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="url" class="col-md-4 col-form-label ">
                        {{ __('Edit url') }}
                    </label>
                    <input id="url" type="text" class="form-control @error('url') 
                    is-invalid @enderror" name="url" value="{{ old('url') ?? $user->profile->url }}" 
                    autocomplete="url" autofocus>
                    @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="image" class="col-md-4 col-form-label ">
                        {{ __('Edit Profile Picture') }}
                    </label>
                    <img src="/storage/{{ $user->profile->image}}" alt="" class="rounded-circle w-40" height="40">
                    <input type="file" class="form-control-file" id="image" name="image">
                    @error('image')
                      
                            <strong >{{ $message }}</strong>
                        
                    @enderror
                </div>
            </div>        
        </div>
        <div class="row pt-4">
            <div class="col-8 offset-2">
                <div class="form-group row">  
                    <button class="btn btn-primary">Save Profile</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
