<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLevels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('level')->default(NULL);
            $table->string('title')->default(NULL);
            $table->integer('difficulty')->default(1);
            $table->string('background')->default(NULL);
            $table->string('answer')->default(NULL);
            $table->string('placeholder')->default(NULL);
            $table->string('html_comment')->default(NULL);
            $table->string('success_image')->default(NULL);
            $table->integer('status')->default(NULL);
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
        Schema::drop('levels');
    }
}
