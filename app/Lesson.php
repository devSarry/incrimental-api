<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    public function author(){
      return $this->belongsTo(App\User::class);
    }
}
