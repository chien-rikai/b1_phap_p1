<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalyticOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analytic_revenue', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->unsigned();
            $table->tinyInteger('date')->unsigned();
            $table->tinyInteger('month')->unsigned();
            $table->tinyInteger('year')->unsigned();
            $table->decimal('revenue', 15, 0)->unsigned();
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
        Schema::dropIfExists('analytic_orders');
    }
}
