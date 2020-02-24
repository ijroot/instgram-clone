<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index($user)
    {
        $user = User::findOrFail($user);
        $follows = (auth()->user()) ?  auth()->user()->following->contains($user->id): false;

        $postsCount = Cache::remember(
            'posts.count'.$user->id,
            now()->addSeconds(3),
            function() use ($user) {
                return $user->posts->count();
            }
        );
        $followingCount = Cache::remember(
            'following.count'.$user->id,
            now()->addSeconds(3),
            function() use ($user) {
                return $user->following->count();

            }
        );

        $followersCount = Cache::remember(
            'followers.count'.$user->id,
            now()->addSeconds(3),
            function() use ($user) {
                return $user->profile->followers->count();
            }
        );

        return view('profiles.index',
            ['user' => $user,
                'follows' => $follows,
                'postsCount' => $postsCount,
                'followingCount' => $followingCount,
                'followersCount' => $followersCount,

            ]);
    }

    public function edit(User $user) {
        $this->authorize('update', $user->profile);

        return view('profiles.edit')->with('user', $user);
    }

    public function update(User $user){
        $this->authorize('update', $user->profile);
        $data = \request()->validate([
            'title'=> 'required',
            'bio' => '',
            'url' => '',
            'image' => 'image',
        ]);
         //   dd($data);

        if (\request('image')){
            $imagePath = $data['image']->store('profile',"public");
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(200,200);
            $image->save();
            auth()->user()->profile->update(array_merge($data, ['image' => $imagePath]));
            return redirect('profile/'. auth()->user()->id);
        }

        auth()->user()->profile->update($data);
        return redirect('profile/'. auth()->user()->id);
    }

}
