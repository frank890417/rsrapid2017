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
        $lang=explode(".",$domain)[0];

        if (!in_array($lang , ["zh","cn","en"])){
          $lang="zh";
        }

        $request->attributes->add([
            "lang"=>$lang
        ]);
        return $next($request);
    }
}
