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
        $domain=$request->route()->action["domain"];
        $lang=explode(".",$domain)[0];
        $request->attributes->add([
            "lang"=>$lang
        ]);
        return $next($request);
    }
}
