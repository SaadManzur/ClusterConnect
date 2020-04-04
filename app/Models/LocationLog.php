<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocationLog extends Model
{
    protected $fillable = [
        'prev_longitude', 'prev_latitude', 'new_longitude', 'new_latitude'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
