<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SolutionTestfieldsNullable extends Migration
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
             $table->string("test_item_title")->nullable()->change();
             $table->string("env_title")->nullable()->change();
             $table->string("schedule_title")->nullable()->change();
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
            $table->string("test_item_title")->nullable(false)->change();
            $table->string("env_title")->nullable(false)->change();
            $table->string("schedule_title")->nullable(false)->change();
         });
     }
}
