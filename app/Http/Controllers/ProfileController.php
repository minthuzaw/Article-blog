<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function update(Request $request,User $profile)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users,email,' . $request->user_id],
            'phone_no' => 'min:9',
            'profile' => 'image|mimes:jpeg,png,jpg,gif'
        ]);

        if ($request->file('profile')) {
            $attributes['profile'] = $this->imageSave($request->file('profile'));
        }

        $profile->update($attributes);

        return redirect()->route('profiles.index')->with('success', 'Profile updated successfully!');
    }

    public function imageSave($file)
    {
        $name = uniqid() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images/'), $name);
        return $name;
    }
}
