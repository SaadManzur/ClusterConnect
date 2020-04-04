<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\SignupRequest;
use App\Http\Requests\UpdateLocaationRequest;

use App\Models\User;
use App\Models\Address;
use App\Models\LocationLog;
use PDO;

class UserController extends ApiController
{
    public function store(SignupRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        $address = Address::create();

        $user = new User($data);
        $user->address()->associate($address);
        $user->save();

        return $this->respond([], "User created");
    }

    public function updateLocation(UpdateLocaationRequest $request)
    {
        $data = $request->validated();

        try
        {
            $user = Auth::user();

            $locationLog = new LocationLog([
                "prev_longitude" => $user->longitude,
                "prev_latitude" => $user->latitude,
                "new_longitude" => $data['longitude'],
                "new_latitude" => $data['latitude']
            ]);
            $locationLog->user()->associate($user);
            $locationLog->save();
            
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

    public function getUserInformation()
    {
        try
        {
            $user = Auth::user();

            $userCollection = collect($user);
            $userCollection->put("address", $user->address);
            
            return $this->respond($userCollection->except("address_id", "email_verified_at"));
        }
        catch (ModelNotFoundException $e)
        {
            return $this->respond([], "User does not exist", 404);
        }
    }
}
