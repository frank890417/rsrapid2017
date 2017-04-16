<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

use App\News;
use App\Question;
class ApiController extends Controller
{
    //
    function news(){
      return News::orderBy('id','desc')->get();
    }
    function questions(){
      return Question::orderBy('stick_top','desc')->limit(3)->get();
    }
}
