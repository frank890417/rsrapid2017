<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use App\News;
use App\Websiteinfo;

use App\LaravelZhconverter;
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
        $lang = Request::get('lang');
        $is_default_lang = Request::get('is_default_lang');

        // if ($is_default_lang){
        //     // dd(Request::getPathInfo());
        //     return redirect('http://www.rapidsuretech.com'.Request::getPathInfo());
        // }

        // dd($lang);
        // dd($lang);
        // if ()
        // dd($metas);
        $lang_pack= Websiteinfo::where("key", $lang)->first()->data;

        // if ($lang=="cn"){
        //     // require("ZhConvert/LaravelZhconverter.php");
        //     $lang_pack= LaravelZhconverter::translate($lang_pack,'CN');
        //     // dd(   LaravelZhconverter::translate($lang_pack,'CN') );
        // }
        return view('home')
               ->with("lang_pack",$lang_pack)
               ->with("metas",$metas)
               ->with("lang",$lang)
            ;
    }
}
