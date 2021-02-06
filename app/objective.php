<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class objective extends Model
{
   public function projects()
    {
        return $this->hasMany(project::class);
    }
}
