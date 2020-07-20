<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false ;
        //dd($follows);
        $postCount = Cache::remember('count.post.'.$user->id, 
        now()->addSeconds(30), 
        function () use ($user){
            return $user->posts->count();
        });

        $followersCount = Cache::remember('count.followers.'.$user->id, 
        now()->addSeconds(30), 
        function () use ($user){
            return $user->profile->followers->count();
        });

        
        $followingCount =Cache::remember('count.following.'.$user->id, 
        now()->addSeconds(30), 
        function () use ($user){
            return  $user->following->count();
        });
        
        return view('profile.index' , compact('user' , 'follows' ,'postCount' ,'followersCount' ,'followingCount'));
    }

    public function edit(User $user)
    {
        $this->authorize('update' , $user->profile);

        return view('profile.edit' , compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update' , $user->profile);
        $data=request()->validate([
            'title'=>'required',
            'desc'=>'required',
            'url'=>'url',
            'image'=>'',
            
        ]);
        
        if(request('image')){
            $ImagePath = request('image')->store('profile' , 'public');
            $image = Image::make(public_path("storage/{$ImagePath}"))->fit(1000,1000);
            $image->save();
            
            $imageArray = ['image' => $ImagePath];
        }
        
        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
            ));
            
        
        
        

        return redirect("/profile/{$user->id}");
    }
}