<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Vendor extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'type', 'email', 'password'];

    protected $hidden = [
        'password', 'remember_token',
    ];
}