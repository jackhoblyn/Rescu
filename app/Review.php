<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $guarded = [];
    
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function vendor()
    {
    	return $this->belongsTo(Vendor::class);
    }

    public function repair()
    {
    	return $this->belongsTo(Repair::class);
    }
}
