<?php

use Illuminate\Database\Seeder;
use App\Question;
class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::truncate();
        //
        $qas = [
        [
        "question"=>"什麼是塑化劑?",
        "answer"=>"塑化劑或稱增塑劑、可塑劑，是一種增加材料的柔軟性或是材料液化的添加劑。其添加對象包含了塑膠、混凝土、牆板泥灰、水泥與石膏等。塑化劑種類多達百餘種，但使用的最普遍的即是一群稱為鄰苯二甲酸酯類的化合物；例如DBP、DEHP、DINP、DIDP、BBP及DNOP等。"
        ],[
        "question"=>"為什麼我們會吃到塑化劑?",
        "answer"=>"因為塑化劑用途廣，對環境造成不小的汙染，通常透過飲水、食物鏈及空氣接觸或呼吸進入體內，其中又以食入為主。例如使用塑膠容器或包裝材料(尤其是PVC類)儲存食物時，DEHP會微量溶出殘留在食物中，或接觸含塑化劑之文具或玩具。"
        ],[
        "question"=>"塑化劑多久才會排出體外?",
        "answer"=>"塑化劑DEHP代謝速度非常快，進入人體後於12~24小時內，約有一半的DEHP及其代謝物會於24~48小時由尿液或糞便排出。
        塑化劑DINP亦會被人體迅速代謝，72小時內有85%由糞便中排出，其餘部分則由尿液排出。在48小時內停止接觸或攝入含有DEHP之產品，體內DEHP濃度便會快速下降，因此不必過度擔憂。"
        ],[
        "question"=>"檢測的原理是什麼呢?",
        "answer"=>"先利用探針在待測物體表面上輕刮一下，再將探針放入檢測設備中加熱。高溫下探針表面的化學粒子釋放成游離狀態，經由質譜分析儀和大量的資料庫進行比對。過程只需5秒即可完成檢測。"
        ],[
        "question"=>"探針是一次性消耗品嗎?會不會造成環境汙染呢?",
        "answer"=>"探針可以利用高溫進行清潔作業。如此一來，就能重覆使用，不會造成環境汙染。"
        ],[
        "question"=>"檢測的範圍有哪些呢?",
        "answer"=>"從塑化劑、農藥、防腐劑到三聚氰胺皆建有大量的資料庫。我們也同時致力於開發新測項來守護民眾食的健康與用的安心。2016年底我們完成了全台共計376間的幼兒園環境健檢活動里程碑，為守護我們下一代零污染空間盡一份心力。"
        ]];
        foreach ($qas as $qa){
          Question::create([
            "question" => $qa["question"],
            "answer" => $qa["answer"],
            "updated_at" => date("Y-m-d H:i:s"),
            "created_at" => date("Y-m-d H:i:s")
          ]);
        }
    }
}
