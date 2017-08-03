<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function content(){
        return view("manage.content");
    }
    //
    public function tern(){
        return view("manage.tern");
    }
    //
    public function job(){
        return view("manage.job");
    }
    //
    public function tech(){
        return view("manage.tech");
    }
    //
    public function contactrecord(){
        return view("manage.contactrecord");
    }
    //
    public function detail_info(){
        return view("manage.detail_info");
    }
}
