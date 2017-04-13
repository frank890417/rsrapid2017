<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
   //
   protected $fillable=['question','answer','stick_top','created_at','updated_at'];

}
