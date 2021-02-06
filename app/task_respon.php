<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class task_respon extends Model
{
    public function task(){
    	
    	return $this->belongsTo(task::class);
    }
    public function user(){
    	
    	return $this->belongsTo(user::class);
    }
    
}
