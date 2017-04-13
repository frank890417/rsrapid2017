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
            'content' => "兒童節即將到來，鴻海旗下永齡健康基金會今年首波公益行動將全台走透透，為偏鄉弱勢的400所幼兒園進行「玩具義診」，針對校園中常見的玩具、遊樂設施、塑膠地墊、餐具等進行「塑化劑」檢測。原來，鴻海樂活養生健康事業群與中山大學謝建台教授產學合作成立「睿軒檢測公司」，發展出快篩檢測平台，能在10秒內檢測出玩具是否帶有有害塑化劑。<br><br>根據中研院多年研究證實，塑化劑會讓人體分泌特殊蛋白質「kiss peptin」，是引發孩童性早熟的重要危險因子。而永齡健康基金會創辦人郭台銘非常喜歡小孩，對孩童健康議題投入極多關注，因此鴻海樂活養生健康事業群與中山大學謝建台教授產學合作成立的「睿軒檢測公司」發展出快篩檢測平台，能在10秒內檢測出玩具是否帶有有害塑化劑。<br><br>永齡表示，年初迄今，檢測人員至30所幼兒園進行抽測，為兒童玩的安全把關，且基金會人員還會特別準備肥皂贈送給幼兒園。基金會副董事長吳良襄表示，面對塑化劑不用害怕，因為塑化劑是脂溶性的化學物，大小朋友只要勤用肥皂洗手，就能把大部分的塑化劑洗掉。<br><br>永齡健康基金會結合產業界與學界的力量，規劃執行弱勢幼兒園「玩具義診」方案，此舉不是要造成幼兒家長與大眾擔憂，而是要拋磚引玉，呼籲社會持續重視塑化劑議題，同時以大眾的力量守護孩童健康，並期待玩具商製作優質玩具，共同打造一個讓孩童健康成長的安全環境。",
            'description' => ["解讀先天遺傳癌症風險，傳統健檢Out、精準醫療In，罹癌時鐘越跑越快。","癌症風險，傳統健檢Out、精準醫療In，罹癌時鐘越跑越快。"][1],
            'tag' => ["睿軒活動","新聞快訊","食安新知","友善連結"][rand(0,3)],
            'size' => $now_size,
            'cover' => "http://monoame.com/temp/img/homepage/News".rand(1,3).".jpg",
            'updated_at' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
          ]);
        }

    }
}
