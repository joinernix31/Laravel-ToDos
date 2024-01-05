<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginFormRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginFormRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken($user->name)->plainTextToken;

            return response()->json([
                'token' => $token,
                'message' => 'success',
            ]);
        } else {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }
    }
}
