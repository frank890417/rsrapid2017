<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Facade\DB;
use Illuminate\Database\Eloquent\Model;
use App\Tech;

class TechSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Tech::truncate();
        Tech::create([
          "title"=> "五秒高效快篩",
          "cover"=> "http://monoame.com/temp/img/homepage/rapid-tech-icon_1.svg",
          "description"=> "不需任何前處理，也不需破壞待測物件。 快速採樣、即時檢測，立即與資料庫進行比對作業，完成一次分析的時間只需5秒。",
            'updated_at' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),

        ]);
        Tech::create([
          "title"=> "獨家探針，多樣檢測",
          "cover"=> "http://monoame.com/temp/img/homepage/rapid-tech-icon_2.svg",
          "description"=> "獨家開發的採樣探針可利用高溫處理被重複使用，不需分析耗材，單次單件分析費用只需傳統檢測的 1/6。可針對有疑慮的物件進行快速分析的檢測作業。",
            'updated_at' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),

        ]);
        Tech::create([
          "title"=> "雲端即時報告",
          "cover"=> "http://monoame.com/temp/img/homepage/rapid-tech-icon_3.svg",
          "description"=> "同時搭配手機App與網頁檢測報告系統，檢測前掃描探針上的QR code並上傳，在完成檢測後便可即時看到檢測報告。在接觸日用品或食用蔬果之前，就為您的安全環境、安心食材層層把關。",
            'updated_at' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),

        ]);

    }
}
