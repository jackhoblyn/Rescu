<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Ad extends Model
{
    use Searchable;
    public $asYouType = true;

    protected $guarded = [];

     /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize array...

        return $array;
    }

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

    

    public function chosen()
    {
        $this->update(['chosen' => 'yes']);

    }

    public function open()
    {
        $this->update(['chosen' => 'no']);
        
    }




}
