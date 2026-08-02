<?php

namespace App\Repositories;

use App\Http\Requests\auth\LoginRequest;
use App\Http\Requests\auth\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\Interfaces\AuthRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthRepository implements AuthRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function register(StoreUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // **create token
        $token = $this->createUserToken($user);

        return response()->json([
            'message' => 'User created successfully',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => new UserResource($user)
        ], 201);
    }

    public function login(LoginRequest $request)
    {
        // **check if user is authenticated
        if (! Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }

        $user = Auth::user();

        // **create token
        $token = $this->createUserToken($user);

        return response()->json([
            'message' => 'Success',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => new UserResource($user)
        ]);
    }

    public function logout(Request $request)
    {
        // **remove token
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out successfully',
        ]);
    }

    public function createUserToken(User $user)
    {
        // **create token
        $token = $user->createToken('auth_token')->plainTextToken;

        return $token;
    }
}
