<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddressRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AddressController extends ApiController
{
    public function updateAddress(AddressRequest $request)
    {
        $data = $request->validated();

        try 
        {
            $user = Auth::user();
            
            $address = $user->address;
            $address->update($data);
        }
        catch(ModelNotFoundException $e)
        {
            return $this->respond([], "User not found", 404);
        }

        return $this->respond([], "Address updated");
    }
}
