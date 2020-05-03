<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //

    public function owner()
      {
          return $this->belongsTo(User::class);
      }
}
