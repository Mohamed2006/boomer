<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PostContents', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('PostId');
     //   $table->foreign('PostId')->references('id')->on('posts');
        $table->string('type'); // 0 text , 1 image
        $table->string('content');
     
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
