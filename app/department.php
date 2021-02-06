<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class department extends Model
{
      public function members()
    {
    	return $this->hasMany(departmentMember::class);
    }
}
