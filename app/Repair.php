<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    protected $guarded = [];

    public function path()
    {
    	return "/repairs/{$this->id}";
    }

     public function list()
    {
        return "/vendor/repairs/{$this->id}";
    }

     public function full()
    {
        return "/repairs/{$this->id}/full";
    }

    public function fullAd()
    {
        return "/vendor/repairs/{$this->id}/fullAd";
    }


	public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

     public function updates()
    {
        return $this->hasMany(Update::class);
    }

    



}
