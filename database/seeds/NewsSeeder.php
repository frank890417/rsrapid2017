<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Facade\DB;
use Illuminate\Database\Eloquent\Model;
use App\News;
class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        News::truncate();
        $size_total=0;
        for($i=0;$i<10;$i++){
          $now_size=1;
          if ($size_total%3==1 || $size_total%3==0)
            $now_size=rand(1,2);
          $size_total+=$now_size;
          News::create([
            'title' => ["全方位企業檢測方案","解讀先天遺傳癌症風險","為安全出發讓生活更美好"][rand(0,2)],
            'date' => '2017.'.str_pad(''.rand(1,12),2,'0',STR_PAD_LEFT).".".str_pad(''.rand(1,31),2,'0',STR_PAD_LEFT),
            'content' => ["全方位企業檢測方案，解讀先天遺傳癌症風險，傳統健檢Out、精準醫療In，罹癌時鐘越跑越快。","癌症風險，傳統健檢Out、精準醫療In，罹癌時鐘越跑越快。解讀先天遺傳癌症風險，傳統健檢Out、精準醫療In，罹癌時鐘越跑越快。傳統健檢Out、精準醫療In，罹癌時鐘越跑越快"][1],
            'description' => ["解讀先天遺傳癌症風險，傳統健檢Out、精準醫療In，罹癌時鐘越跑越快。","癌症風險，傳統健檢Out、精準醫療In，罹癌時鐘越跑越快。解讀先天遺傳癌症風險，傳統健檢Out、精準醫療In，罹癌時鐘越跑越快。傳統健檢Out、精準醫療In，罹癌時鐘越跑越快"][1],
            'tag' => ["重要通知","活動快訊","投資相關"][rand(0,2)],
            'size' => $now_size,
            'cover' => "http://monoame.com/temp/img/homepage/News".rand(1,3).".jpg",
            'updated_at' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
          ]);
        }

    }
}
