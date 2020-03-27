<?php

namespace App\Http\Requests;

class LoginRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'password' => 'required'
        ];
    }
}
