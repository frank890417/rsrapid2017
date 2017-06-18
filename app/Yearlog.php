<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yearlog extends Model
{
    //
    protected $fillable=['id','year','date','title','news_id','cover','content'];
}
