<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
   //
   protected $fillable=['question','answer','created_at','updated_at'];

}
