<?php

namespace App\Http\Requests;

class SignupRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone' => 'required|unique:users|regex:/(01)[0-9]{9}/',
            'password' => 'required|max:32',
            'name' => 'required|max:255',
            'email' => 'email',
            'home_longitude' => 'required|numeric',
            'home_latitude' => 'required|numeric'
        ];
    }
}
