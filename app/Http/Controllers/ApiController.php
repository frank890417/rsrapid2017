<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

use App\News;
class ApiController extends Controller
{
    //
    function news(){
      return News::all();
    }
}
