<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class family extends Model
{
   public function project()
    {
    	return $this->belongsTo(project::class);
    }
     public function members()
    {
    	return $this->hasMany(familymember::class);
    }
}
