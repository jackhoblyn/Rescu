<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cmgmyr\Messenger\Traits\Messagable;

class User extends Authenticatable
{
    use Notifiable;
    use Messagable;

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

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function convos()
    {
        return $this->hasMany(Convo::class);
    }

    public function msgs()
    {
        return $this->hasMany(Msg::class);
    }

    public function messages()
    {
        return $this->msgs()->where('read','=', 'no');
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
