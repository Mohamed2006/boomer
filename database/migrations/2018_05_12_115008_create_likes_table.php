<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
     Schema::create('Likes', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('UserId');
        $table->integer('ItemId');
        $table->foreign('UserId')->references('id')->on('users');
        $table->foreign('ItemId')->references('id')->on('items');
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
    }
}
