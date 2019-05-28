<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Cmgmyr\Messenger\Traits\Messagable;
use Laravel\Scout\Searchable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Vendor extends Authenticatable
{
    use Notifiable, Searchable, Messagable;
    
    public $asYouType = true;

    protected $guard = 'vendor';

    protected $guarded = [];

    protected $fillable = ['name', 'type', 'email', 'city', 'phone', 'bio', 'skill', 'password', 'gcached'];

    protected $hidden = [
        'password', 'remember_token',
    ];

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

    public function map()
    {
        return "/map/{$this->id}";
    }

    public function path()
    {
        return "/view/{$this->id}";
    }

    public function message()
    {
        return "/messages/message/{$this->id}";
    }

    public function convos()
    {
        return $this->hasMany(Convo::class);
    }

     public function responses()
    {
        return $this->hasMany(Response::class);
    }

    public function repairs()
    {
        return $this->hasMany(Repair::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function gmaps_geocache()
    {
        return $this->hasOne(gmaps_geocache::class);
    }

    public function edit()
    {
        return "/vendor/profile/{$this->id}/update";
    }

    public function photo()
    {
        return "/vendor/profile/{$this->id}/editPhoto";
    }

    public function sendMessage()
    {
        return "/messages/message/{$this->id}/send";
    }
}