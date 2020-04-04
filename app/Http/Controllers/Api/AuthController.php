<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends ApiController
{
    public function login(LoginRequest $request) 
    {
        $credentials = $request->validated();

        if(Auth::attempt($credentials)) {

            $user = Auth::user();
            $accessToken = $user->createToken('cluster_web')->accessToken;

            return $this->respond(['token' => $accessToken]);
        }
        else {

            return $this->respond([], "Incorrect phone or password", 401);
        }
    }
}
