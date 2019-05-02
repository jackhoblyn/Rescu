<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Update extends Model
{
    protected $guarded = [];

    protected static function boot() 

    {
        parent::boot();

        static::created(function ($update) {

            $update->repair->ad->recordActivity('update posted');
        });


    }

    public function repair()
    {
        return $this->belongsTo(Repair::class);
    }

}
