<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Lesson extends Model
{
    protected $fillable = ['title', 'body'];


    public function author(){
      return $this->belongsTo(User::class, 'user_id');
    }
}
