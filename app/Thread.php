<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
     protected $fillable = ['vendor_id'];
     protected $guarded = [];
}
