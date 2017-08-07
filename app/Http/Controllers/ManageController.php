<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;

class ManageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function content(){
        $lang = Request::get('lang');
        return view("manage.content")
               ->with("lang",$lang);
    }
    //
    public function tern(){
        $lang = Request::get('lang');
        return view("manage.tern")
               ->with("lang",$lang);
    }
    //
    public function job(){
        $lang = Request::get('lang');
        return view("manage.job")
               ->with("lang",$lang);
    }
    //
    public function tech(){
        $lang = Request::get('lang');
        return view("manage.tech")
               ->with("lang",$lang);
    }
    //
    public function contactrecord(){
        $lang = Request::get('lang');
        return view("manage.contactrecord")
               ->with("lang",$lang);
    }
    //
    public function detail_info(){
        $lang = Request::get('lang');
        return view("manage.detail_info")
               ->with("lang",$lang);
    }
}
