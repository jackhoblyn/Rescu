<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class convo extends Model
{
    protected $guarded = [];

    

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

     public function vendor()
    {
    	return $this->belongsTo(Vendor::class);
    }

    public function addMsg($vendor_id, $user_id, $body)
    {
        return $this->msgs()->create(compact('vendor_id', 'user_id', 'body'));
    }

    public function messages()
    {
        return $this->hasMany(Msg::class);
    }

    public function path()
    {
        return "/messages/{$this->id}";
    }

    public function list()
    {
        return "/vendor/messages/{$this->id}";
    }
}
