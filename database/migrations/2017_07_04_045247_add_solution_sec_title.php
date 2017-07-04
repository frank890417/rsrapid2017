<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSolutionSecTitle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('solutions', function($table) {
            //
            $table->string("test_item_title")->default("檢驗項目");
            $table->string("env_title")->default("適用環境");
            $table->string("schedule_title")->default("方案類型");
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('solutions', function($table) {
            //
            $table->dropColumn("test_item_title");
            $table->dropColumn("env_title");
            $table->dropColumn("schedule_title");
            
        });
    }
}
