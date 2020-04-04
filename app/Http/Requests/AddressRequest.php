<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'street_address1' => 'required|max:255',
            'street_address2' => 'max:255',
            'region' => 'required',
            'zipcode' => 'required|integer',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric'
        ];
    }
}
