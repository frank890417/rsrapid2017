<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact_record extends Model
{
    //
    protected $fillable = ["name","email","ask_item_id","content","updated_at","created_at"];
    
    public function ask_item()
    {
        return $this->hasOne('App\Solution','id','ask_item_id');
    }
}
