<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tech extends Model
{
    //
    protected $fillable=['title','description','content','cover','icon','created_at','updated_at'];
}
