<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{
   public function objective()
    {
    	return $this->belongsTo(objective::class);
    }

    public function tasks()
    {
    	return $this->hasMany(task::class);
    }

     public function families()
    {
    	return $this->hasMany(family::class);
    }
}
