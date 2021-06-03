<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $attemptResult = Auth::attempt([
            'email'    => $request->email,
            'password' => $request->password
        ]);
        if (!$attemptResult) {
            return response(['message ' => 'auth failed']);
        }

        $accessToken = Auth::user()->createToken("myUserToken")->accessToken;
        return response([
            'user' => Auth::user(),
            'access token' => $accessToken
        ], 200);
    }

    public function logout(Request $request)
    {
        Auth::user()->token()->revoke();
        return response()->json([
            'message' => 'logout_success'
        ], 200);
    }
}
