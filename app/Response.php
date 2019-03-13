<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $guarded = [];

    protected $touches = ['ad'];

    public function ad()
    {
    	return $this->belongsTo(Ad::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function path()
    {
    	return "/ads/{$this->ad->id}/responses/{$this->id}";
    }
   
}

