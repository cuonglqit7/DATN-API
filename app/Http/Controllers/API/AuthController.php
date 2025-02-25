<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login()
    {
        try {
            request()->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);
            $user = User::where('email', request('email'))->first();

            if (!$user || !Hash::check(request('password'), $user->password)) {
                throw ValidationException::withMessages([
                    'email' => ['The provider credentials are incorrect.'],
                ]);
            }

            $token = $user->createToken($user->id)->plainTextToken;

            return response()->json([
                'token' => $token,
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            if ($th instanceof ValidationException) {
                return response()->json([
                    'errors' => [$th->getMessage()],
                ], Response::HTTP_BAD_REQUEST);
            }

            return response()->json([
                'errors' => [$th->getMessage()],
            ], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function register()
    {
        try {
            $data = request()->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:8|max:20',
            ]);

            $user = User::create($data);
            $user->syncRoles('user');
            $token = $user->createToken($user->id)->plainTextToken;

            return response()->json([
                'token' => $token,
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            if ($th instanceof ValidationException) {
                return response()->json([
                    'errors' => [$th->getMessage()],
                ], Response::HTTP_BAD_REQUEST);
            }

            return response()->json([
                'errors' => $th->getMessage(),
            ], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function logout()
    {
        try {
            request()->user()->currentAccessToken()->delete();

            return response()->json([
                'message' => 'Đăng xuất thành công'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'errors' => $th->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}