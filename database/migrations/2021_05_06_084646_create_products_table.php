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
            $table->text('url_image');
            $table->text('description');
            $table->decimal('price', 15, 0)->unsigned();
            $table->decimal('price_promotion', 15, 0)->unsigned();
            $table->integer('view')->unsigned();
            $table->tinyInteger('star_rating')->unsigned();
            $table->tinyInteger('category_id')->unsigned();
            $table->tinyInteger('stock')->default(0)->unsigned();
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
