<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class task_paper extends Model
{
   public function task (){
    	
    	return $this->belongsTo(task::class);
    }

}
