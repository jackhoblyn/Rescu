<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    protected $guarded = [];

    protected static function boot() 

    {
        parent::boot();

        static::created(function ($repair) 
        {
            Activity::create([
            'ad_id' => $repair->ad->id,
            'description' => 'repair started'
        ]); 

        });
    }

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

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }

    public function response()
    {
        return $this->belongsTo(Response::class);
    }

     public function updates()
    {
        return $this->hasMany(Update::class);
    }

    public function finish()
    {
        $this->update(['complete' => 'yes']);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    



}
