<?php

namespace App\Http\Middleware;

use Closure;

use App\News;
use App\Solution;
class seoinfo
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
        //default meta data for all webisite
        $meta_title = '睿軒檢驗科技';
        $meta_cover = 'http://www.rapidsuretech.com/img/og_default.png';
        $meta_description = '在關懷台灣食品與環境安全的問題，我們看見自己的愛與責任。於是在一群熱愛這片土地的我們努力下，從學界研究走向產業應用，與國立中山大學共同開發「質譜快速檢驗平台」專利技術，於2015年成立了睿軒檢驗科技。';
        
        //page_set
        $post_fix = ' - 睿軒檢驗科技';
        // dd($request);
        // dd($request->getPathInfo());
        $current_path = $request->getPathInfo();

        // match solution
        if ( preg_match("/solution\/n\/(.*)/",$current_path,$test) ){
            $match_solution = Solution::where("title", urldecode($test[1]))->first();
            if ($match_solution ){
                $meta_title=$match_solution->title. $post_fix ;
                // $meta_title=$match_solution->title. $post_fix ;
                $meta_description=$match_solution->sub_content;
            }
        }


        // match news
        if ( preg_match("/news\/([0-9]*?)$/",$current_path,$test) ){
            $match_news = News::where("id", urldecode($test[1]))->first();
            if ($match_news ){
                $meta_title=$match_news->title. $post_fix ;
                $meta_cover=$match_news->cover ;
                // $meta_title=$match_news->title. $post_fix ;
                $meta_description= mb_substr(preg_replace("/lt/",'',$match_news->content),0,50)."...";
            }
        }
        // switch($request->pathInfo){
        //     case '/':
        //     case '/home':    
        //         break;

        //     case '/about':
        //         $meta_title = '關於' . $post_fix;
        //     case '/news':
        //         $meta_title = '新聞' . $post_fix;
        //     case '/news':
        //         $meta_title = '新聞' . $post_fix;
        // }



        //add meta to request ,send to controller
        $request->attributes->add(
          [
            'metas' =>[
                'meta_title'=>$meta_title,
                'meta_cover'=>$meta_cover,
                'meta_description'=>$meta_description  
            ]
          ]
        );
        // dd($request);
        return $next($request);
    }
}
