<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class familymember extends Model
{
    public function family()
    {
    	return $this->belongsTo(family::class);
    }
}
