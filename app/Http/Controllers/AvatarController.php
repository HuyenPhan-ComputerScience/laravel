<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Http\Request;
use Storage;

class AvatarController extends Controller
{
    public function update(UpdateAvatarRequest $request)
    {
        // $request->validate([
        //     'avatar' => "required|image",
        // ]);
        $path = $request->file('avatar')->store('avatars', 'public');
        if ($oldAvatar = $request->user()->avatar) {
            Storage::disk('public')->delete($oldAvatar);
        }
        auth()->user()->update(['avatar' => $path]); //storage_path("app/$path")]);
        // auth()->user()->update(['avatar' => 'test']);
        // dd($path);


        // dd($request->all());
        // return response()->redirectTo('/profile');
        return back(); //->with('message', 'Avatar uploaded successfully.');

    }

//
}