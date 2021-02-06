<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class user_paper extends Model
{
    public function user()
    {
    	return $this->belongsTo(user::class);
    }
}
