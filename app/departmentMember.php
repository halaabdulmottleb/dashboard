<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class departmentMember extends Model
{
    public function department()
    {
    	return $this->belongsTo(department::class);
    }
}
