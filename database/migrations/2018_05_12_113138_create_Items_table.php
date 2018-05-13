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
      Schema::create('Items', function (Blueprint $table) {
          $table->increments('id');
          
          $table->integer('UserId');
          $table->foreign('UserId')->references('id')->on('users');
          $table->timestamps();
          $table->string('name');
          $table->integer('StockCount');
          $table->integer('price');
          $table->integer('type'); // 0 original, 1 is retweeted
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
