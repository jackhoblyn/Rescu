<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class msg extends Model
{
    protected $guarded = [];

    protected $touches = ['convo'];

     public function convo()
    {
    	return $this->belongsTo(Convo::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function path()
    {
        return "/view/{$this->vendor->id}";
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

     public function markAsRead()
    {
        $this->update(['read' => 'yes']);

    }
}
