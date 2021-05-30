<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('phone', 14);
            $table->string('email', 100);
            $table->string('address', 100);
            $table->integer('member_id')->unsigned()->nullable();
            $table->tinyInteger('status')->unsigned()->default(0);
            $table->dateTime('date_order_end')->nullable();
            $table->dateTime('date_take_money')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
