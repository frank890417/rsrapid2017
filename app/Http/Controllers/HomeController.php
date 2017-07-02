<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use App\News;
use App\Websiteinfo;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $metas = Request::get('metas');
        // dd($metas);
        $lang_zh = Websiteinfo::where("key","zh")->first()->data;
        return view('home')
               ->with("lang_zh",$lang_zh)
               ->with("metas",$metas)
            ;
    }
}
