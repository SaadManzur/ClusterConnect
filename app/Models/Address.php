<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'street_address1', 'street_address2', 'region', 'zipcode', 'longitude', 'latitude'
    ];
}
