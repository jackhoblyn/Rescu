<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Update extends Model
{
    protected $guarded = [];

    public function repair()
    {
        return $this->belongsTo(Repair::class);
    }

}
