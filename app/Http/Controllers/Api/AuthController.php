<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Register
     *
     * @group Auth
     *
     * @unaunthenticate
     *
     * @bodyParam name string required The title of the user. Example: jhon
     * @bodyParam email string required The title of the user. Example: jhon@email.com
     * @bodyParam password string required The title of the user. Example: password
     */
    public function register(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $attributes['password'] = bcrypt($request->password);

        $user = User::create($attributes);
        $token = $user->createToken('Registering User')->accessToken;

        return response()->json([
            'status' => 200,
            'data' => [
                'token' => $token,
                'user' => $user,
            ],
        ]);
    }

    /**
     * Login
     *
     * @group Auth
     *
     * @unaunthenticate
     *
     * @bodyParam email string required The title of the user. Example: jhon@email.com
     * @bodyParam password string required The title of the user. Example: password
     */
    public function login(Request $request)
    {
        $attributes = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $attributes['email'])->first();
        if ($user) {
            if (Hash::check($attributes['password'], $user->password)) {
                $token = $user->createToken('Laravel Password Grant Client')->accessToken;

                return response()->json([
                    'status' => 200,
                    'data' => [
                        'token' => $token,
                        'user' => $user,
                    ],
                ]);
            } else {
                return response()->json([
                    'status' => 422,
                    'data' => [
                        'message' => 'Wrong Credentials',
                    ],
                ]);
            }
        } else {
            return response()->json([
                'status' => 422,
                'data' => [
                    'message' => 'Wrong Credentials',
                ],
            ]);
        }
    }
}
