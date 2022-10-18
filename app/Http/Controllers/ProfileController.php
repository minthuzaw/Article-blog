<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::id())->first();

        return view('profile.index', compact('user'));
    }

    public function edit()
    {
        $user = User::where('id', Auth::id())->first();

        return view('profile.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $profile)
    {
        $attributes = $request->validated();
        if ($request->filled('password')) {
            $attributes['password'] = Hash::make($attributes['password']);
        } else {
            unset($attributes['password']);
        }
        if ($request->file('profile')) {
            $attributes['profile'] = $this->imageSave($request->file('profile'));
        }
        $profile->update($attributes);
        return redirect()->route('profiles.index')->with('success', 'Profile updated successfully!');
    }

    public function imageSave($file)
    {
        $name = uniqid().'_'.$file->getClientOriginalName();
        $file->move(public_path('images/'), $name);

        return $name;
    }
}
