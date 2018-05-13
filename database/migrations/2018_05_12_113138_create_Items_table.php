<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
      Schema::create('users', function (Blueprint $table) {
          $table->increments('id');
          $table->foreign('UserId')->references('id')->on('users');
          $table->timestamps();
          $table->string('name');
          $table->id('StockCount');
          $table->id('price');
          $table->id('type'); // 0 original, 1 is retweeted
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
