<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('slug', 120);
            $table->text('url_image')->nullable();
            $table->text('description');
            $table->decimal('price', 15, 0)->unsigned();
            $table->decimal('price_promotion', 15, 0)->unsigned()->nullable();
            $table->tinyInteger('stock')->default(0);
            $table->integer('view')->unsigned()->nullable()->default(0);
            $table->integer('count_rating')->unsigned()->nullable()->default(1);
            $table->integer('score_rating')->unsigned()->nullable()->default(3);
            $table->tinyInteger('star_rating')->unsigned()->nullable()->default(3);
            $table->tinyInteger('category_id')->unsigned();
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
        Schema::dropIfExists('products');
    }
}
