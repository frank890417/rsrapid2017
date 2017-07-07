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
    public function handle($request, Closure $next)
    {
        // dd($request->route());
        $domain = $request->getHost();
        $prefix = explode(".",$domain)[0];
        $lang = $prefix;
        $is_default_lang=false;

        if (!in_array($lang , ["www","cn","en"])){

          $lang="zh";
          $is_default_lang=true;
        }


        $request->attributes->add([
            "lang"=>$lang,
            "is_default_lang"=>$is_default_lang
        ]);
        return $next($request);
    }
}
