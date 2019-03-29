<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gmaps_geocache extends Model
{
     protected $guarded = [];
     protected $table = 'gmaps_geocache';

     public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
