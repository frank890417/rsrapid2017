<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Yearlogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('yearlogs',function($table){

          $table->increments('id');
          $table->string('title')->nullable();
          $table->string('content',1000)->nullable();
          $table->string('cover')->nullable();
          $table->integer('news_id')->nullable();
          $table->string('date')->nullable();
          $table->integer('year')->nullable();
          $table->timestamps();

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
        Schema::drop('yearlogs');
    }
}
