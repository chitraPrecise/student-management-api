<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Helpers\ApiResponse;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;


class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user   = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password)
        ]);

        $token  = $user->createToken('API Token')->accessToken;

        return ApiResponse::success(
            'User registered successfully!',
            [
                'id' => $user->id,
                'username' => $user->name,
                'status' => 'ACTIVE',
                'token' => $token
            ],
            201
        );
    }

    public function login(LoginRequest $request)
    {
        if (!\Auth::attempt($request->only('email', 'password'))) {
            return ApiResponse::error(
                'Invalid email or password.',
                401
            );
        }

        $user   = \Auth::user();
        $token  = $user->createToken('API Token')->accessToken;

        $data   = [
            'id'        => $user->id,
            'username'  => $user->name,
            'status'    => 'ACTIVE',
            'token'     => $token
        ];

        return ApiResponse::success(
            'Logged in Successfully!',
            $data,
            200
        );
    }
}