<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $fillable=["title","date","content","cover","tag","size","author","news_id","updated_at","created_at","carousel"];

}
