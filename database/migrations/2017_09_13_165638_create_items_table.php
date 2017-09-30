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
        Schema::create('items', function (Blueprint $table) {
//            $table->increments('id');
//            $table->timestamps();
//            $table->string('title');
//            $table->integer('price');
//            $table->date('buyDate');
//            $table->string('category');
//
//            $table->integer('user_id');

            $table->increments('id');
            $table->timestamps();
            $table->longText('url');
            $table->longText('review');
            $table->longText('itemTitle');
            $table->longText('itemPicture');
            $table->string('itemPrice');
            $table->longText('itemSpecifics');
            $table->longText('itemSeller')->default('null');
            $table->longText('itemRating');
            $table->integer('user_id');
            $table->integer('likes')->default('0');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
