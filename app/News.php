<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $fillable=["title","date","content","tag","size","description","news_id","updated_at","created_at"];
}
