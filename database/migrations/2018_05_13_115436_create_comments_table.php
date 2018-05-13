<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('UserId');
        $table->integer('ItemId');
        $table->integer('TaggedUser');
        $table->foreign('UserId')->references('id')->on('users');
        $table->foreign('ItemId')->references('id')->on('items');
        $table->string('comment');
        $table->foreign('TaggedUser')->references('id')->on('users');
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
        Schema::dropIfExists('user');
    }
}
