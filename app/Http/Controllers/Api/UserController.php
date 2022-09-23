<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Index
     *
     * @group User
     */
    public function index()
    {
        $users = User::all();

        return response()->json([
            'status' => 200,
            'data' => [
                'users' => $users,
            ],
        ]);
    }

    /**
     * Index
     *
     * @group User
     */
    public function show($id)
    {
        $user = User::find($id);

        if (! $user){
            return response()->json([
                'status' => 404,
                'data' => [
                    'message' => 'User Not Found.',
                ],
            ]);
        }
        return response()->json([
            'status' => 200,
            'data' => [
                'user' => $user,
            ],
        ]);
    }

    /**
     * Store
     *
     * @group User
     *
     * @bodyParam name string required The name of the user. Example: jhon
     * @bodyParam email string required The email of the user. Example: jhon@email.com
     * @bodyParam password string required The password of the user. Example: password
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);
        $attributes['password'] = Hash::make($request->password);

        $user = User::create($attributes);

        return response()->json([
            'status' => 200,
            'data' => [
                'user' => $user,
            ],
        ]);
    }

    /**
     * Update
     *
     * @group User
     *
     * @bodyParam name string required The name of the user. Example: jhon
     * @bodyParam email string required The email of the user. Example: jhon@email.com
     */
    public function update(User $user, Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
        ]);

        $user = $user->update($attributes);

        return response()->json([
            'status' => 200,
            'data' => [
                'user' => $user,
            ],
        ]);
    }

    /**
     * Store
     *
     * @group User
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'status' => 200,
            'data' => [
                'message' => 'User Deleted Successful',
            ],
        ]);
    }
}
