<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class note extends Model
{
   public function task (){
    	
    	return $this->belongsTo(task::class);
    }
	
}
