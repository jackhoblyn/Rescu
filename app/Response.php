<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use RecordsActivity;

    protected $guarded = [];

    protected $touches = ['ad'];

    protected static function boot() 

    {
        parent::boot();

        static::created(function ($response) {

            $response->ad->recordActivity('response posted');

        });

        static::updated(function ($response) {

            $response->ad->recordActivity('response picked');
            $response->ad->recordActivity('repair strated');
        
         });
    }

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

    

    // public function recordActivity($description)
    // {

    //     $this->activity()->create([
    //         'ad_id' => $this->ad_id,
    //         'description' => $description
    //     ]);

    // }

    // *
    // *
    // * The activity feed for the project
    // *
    // * @return \Illuminate\Database\Eloquent\Relations\MorphMany 
    // *
    
    // public function activity()
    // {
    //     return $this->morphMany(Activity::class, 'subject')->latest();
    // }

    // {
    //     Activity::create([
    //         'ad_id' => $this->id,
    //         'description' => $type
    //     ]); 

    // }

    
   
}

