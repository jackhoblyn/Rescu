<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use RecordsActivity;

    protected $guarded = [];

    public function path()
    {
    	return "/ads/{$this->id}";
    }

    public function full()
    {
        return "/ads/full/{$this->id}";
    }

    public function edit()
    {
        return "/ads/edit/{$this->id}";
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

    public function addResponse($vendor_id, $description, $offer)
    {
        return $this->responses()->create(compact('vendor_id', 'description', 'offer'));
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }

    // public function recordActivity($description)
    // {

    // $this->activity()->create(compact('description'));

    // }

    // public function activity()
    // {
    //     return $this->hasMany(Activity::class)->latest();;
    // }

    public function chosen()
    {
        $this->update(['chosen' => 'yes']);

        $this->recordActivity('response picked');
    }

    public function open()
    {
        $this->update(['chosen' => 'no']);
        
        $this->recordActivity('ad reopened');
    }




}
