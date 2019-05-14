<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'city', 'bio', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }

     public function repairs()
    {
        return $this->hasMany(Repair::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function edit()
    {
        return "/profile/{$this->id}/update";
    }

    public function photo()
    {
        return "/profile/{$this->id}/editPhoto";
    }
        


}
