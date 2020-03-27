<?php

namespace App\Http\Requests;

class UpdateLocaationRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric'
        ];
    }
}
