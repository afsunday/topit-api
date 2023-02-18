<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Support\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Authenticates user and returns token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:50'],
            'password' => ['required', 'string', 'max:50']
        ]);

        $user = User::where('email', $request->email)->first();

        if(! $user) {
            return Utils::validateResp([
                'email' => ['The login information is invalid please check and retry.']
            ]);
        }

        if (! Hash::check( $request->password, $user->password)) {
            return Utils::validateResp([
                'email' => ['The password or email is invalid']
            ]);
        }

        return Utils::successResp([
            'token' => $user->createToken('authToken')->plainTextToken,
            'user' => $user,
        ]);
    }

    /**
     * log user out
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return Utils::successResp([], 'Successfully logged out');
    }
}
