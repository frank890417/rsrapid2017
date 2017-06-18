<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

use App\News;
use App\Question;
use App\Solution;
use App\Yearlog;
class ApiController extends Controller
{
    //
    function news(){
      return News::orderBy('id','desc')->get();
    }
    function questions(){
      return Question::orderBy('stick_top','desc')->limit(3)->get();
    }
    function solutions(){
      return Solution::all();
    }
    function yearlogs(){
       return Yearlog::all();
    }
}
