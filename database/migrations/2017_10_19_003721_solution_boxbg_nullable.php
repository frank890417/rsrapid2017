<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SolutionBoxbgNullable extends Migration
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
             $table->string("boxbg")->nullable()->change();
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
            $table->string("boxbg")->nullable(false)->change();
         });
     }
 }
