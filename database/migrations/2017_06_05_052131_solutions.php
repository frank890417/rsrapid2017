<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Solutions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('solutions',function($table){

          $table->increments('id');
          $table->string('title')->nullable();
          $table->string('sub_title',1000)->nullable();
          $table->text('sub_content')->nullable();
          $table->text('test_item')->nullable();
          $table->text('env')->nullable();
          $table->text('schedule')->nullable();
          $table->text('talk')->nullable();
          $table->string('solution_area_slogan')->nullable();

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
        Schema::drop('solutions');
    }
}
