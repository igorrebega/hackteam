<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductRankmoji extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_rankmoji', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->decimal('angry', 5, 2);
            $table->decimal('sad', 5, 2);
            $table->decimal('neutral', 5, 2);
            $table->decimal('happy', 5, 2);
            $table->decimal('surprised', 5, 2);
            $table->tinyInteger('overall_emoji');
            $table->decimal('overall_rank', 8, 2);
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_rankmoji');
    }
}
