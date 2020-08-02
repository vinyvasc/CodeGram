<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    //
    public function show(User $user) {

        $follows = auth()->user()? auth()->user()->following->contains($user->id): false;

        return view('profiles/show', [
            'user' => $user,
            'follows'=> $follows,
        ]);


    }

    public function edit(User $user) {

        $this->authorize('update', $user->profile);

        return view('profiles/edit', compact('user'));
    }

    public function update(User $user) {

        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'description' => 'nullable',
            'url' => 'nullable|url',
            'image' => 'nullable|image',
        ]);

        if(request('image')) {
            $imagePath = request('image')->store('uploads', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(800, 800);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge($data, $imageArray ?? []));

        return redirect("/profile/{$user->id}");
    }
}
