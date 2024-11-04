<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Resources\Api\UserResource;
use App\Models\User;
use App\Traits\ApiResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use ApiResponses;

    public function register(RegisterUserRequest $request): JsonResponse
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return $this->success('Registered successfully', new UserResource($user), 201);
        // return response()->json(['data' => new UserResource($user)], 201);
    }

    public function login(LoginRequest $request): JsonResponse
    {

        $request->validated($request->all());

        if (! Auth::attempt($request->only('email', 'password'))) {
            return $this->error(
                'Invalid Login details',
                '',
                401
            );
        }

        $user = auth()->user();

        $token = $request->user()->createToken('auth_token_'.$user->id)->plainTextToken;

        return $this->success(
            'Authenticated',
            [
                'token' => $token,
                'type' => 'bearer',
            ]
        );
    }

    public function logout(LoginRequest $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return $this->success('User Log Out');
    }
}
