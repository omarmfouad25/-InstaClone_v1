@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($posts as $post)
    <div class="pb-3">
    <div class="row ">
        <div class="col-6 offset-3 border p-2 ">
            <div class="w-100">
                <div class="d-flex align-items-center"> 
                    <div class="pr-3 ">
                        <img src="{{ $post->user->profile->profileImage() }}" class="w-100 rounded-circle" style="max-width:40px;" >
                    </div>
                    <div class="font-weight-bold">
                        <a href="/profile/{{ $post->user->id }}">
                            <span class="text-dark">{{ $post->user->username }}</span>
                        </a>
                        <a href="#" class="pl-3">Follow</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 offset-3">
            <img src="/storage/{{ $post->image }}" class="w-100 figure-img img-fluid">
        </div>
    </div>
    <div class="row ">
        <div class="col-6 offset-3 border p-1">
            <p>
                <span class="font-weight-bold">
                    <a href="/profile/{{ $post->user->id }}">
                        <span class="text-dark">{{ $post->user->username }}</span>
                    </a>
                </span>
                {{ $post->caption}}
            </p>
        </div>
        
    </div>
</div>
    @endforeach
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
