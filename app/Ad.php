<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $guarded = [];

    public function path()
    {
    	return "/ads/{$this->id}";
    }

    public function list()
    {
    	return "/vendor/ads/{$this->id}";
    }

    public function respond()
    {
    	return "/vendor/ads/respond/{$this->id}";
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function addResponse($description)
    {
        return $this->responses()->create(compact('description'));
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }
}
