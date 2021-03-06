<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class News extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('news',function($table){

          $table->increments('id');
          $table->string('tag')->nullable();
          $table->string('date')->nullable();
          $table->string('title')->nullable();
          $table->string('cover',500)->nullable();
          $table->integer('size')->default(1);
          $table->string('author',500)->nullable();
          $table->text('content')->nullable();
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
        Schema::drop('news');
    }
}
