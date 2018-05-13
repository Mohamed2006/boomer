<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('Posts', function (Blueprint $table) {
       $table->increments('id');
        $table->foreign('UserId')->references('id')->on('users');
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
        //
    }
}
