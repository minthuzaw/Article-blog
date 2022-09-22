<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return response()->json([
            'status' => 200,
            'data' => $user
        ]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:user',
            'password' => 'required'
        ]);

        $user = User::create($attributes);
        return response()->json([
            'status' => 200,
            'data' => $user
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            'status' => 200
        ]);
    }
}
