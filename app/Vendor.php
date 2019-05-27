<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Vendor extends Authenticatable
{
    use Notifiable;

    protected $guard = 'vendor';

    protected $fillable = ['name', 'type', 'email', 'city', 'phone', 'bio', 'skill', 'password', 'gcached'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function map()
    {
        return "/map/{$this->id}";
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
}