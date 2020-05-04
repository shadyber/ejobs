<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    //

       public function projects()
     {
         return $this->hasMany(Job::class);
     }
}
