<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    public function project (){
    	
    	return $this->belongsTo(project::class);
    }

    public function tasks (){
    	
    	return $this->hasMany(task_respon::class);
    }
	public function task_papers(){
    	
    	return $this->hasMany(task_paper::class);
    }
    	public function notes(){
    	
    	return $this->hasMany(note::class);
    }




}
