<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        $attributes['password'] = bcrypt($request->password);

        $user = User::create($attributes);
        $token = $user->createToken('Registering User')->accessToken;

        return response()->json([
            'status' => 200,
            'data' => $user,
            'token' => $token
        ]);
    }

    public function login(Request $request)
    {
        $attributes = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $attributes['email'])->first();
        if ($user) {
            if (Hash::check($attributes['password'], $user->password)) {
                $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                $response = ['access_token' => $token];
                return response($response, 200);
            } else {
                $response = ["message" => "Password mismatch"];
                return response($response, 422);
            }
        } else {
            $response = ["message" => 'User does not exist'];
            return response($response, 422);
        }
    }
}
