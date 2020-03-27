<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\UpdateLocaationRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends ApiController
{
    public function store(SignupRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return $this->respond([], "User created");
    }

    public function updateLocation(UpdateLocaationRequest $request)
    {
        $data = $request->validated();

        try
        {
            $user = Auth::user();
            $user->longitude = $data['longitude'];
            $user->latitude = $data['latitude'];
            $user->save();

            return $this->respond([], "Location updated");
        }
        catch(ModelNotFoundException $e)
        {
            return $this->respond([], "User not found", 404);
        }
    }
}
