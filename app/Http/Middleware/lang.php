<?php

namespace App\Http\Middleware;
use Route;
use Closure;

class lang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next ,$routelang)
    {
        // dd($request->route());
        $domain = $request->getHost();
        $prefix = explode(".",$domain)[0];
        // $lang = $prefix;
        $lang = $routelang;
        $is_default_lang=false;

        if (!in_array($lang , ["zh","cn","en"])){

          $lang="zh";
          $is_default_lang=true;
        }
        if ($prefix=="www"){
            $is_default_lang=false;
        }


        $request->attributes->add([
            "lang"=>$lang,
            "is_default_lang"=>$is_default_lang
        ]);
        return $next($request);
    }
}
