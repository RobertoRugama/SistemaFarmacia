<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CretatePurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     
     * @return void
     */
    public function up()
    {
        //
        Schema::create('purchase_orders', function(Blueprint $table){
            $table->increments('id');
            $table->datetime('order_date');
            $table->datetime('required_date');
            $table->datetime('date_of_delivery');
            $table->boolean('status');

            $table->integer('provider_id')->unsigned();
            $table->integer('employee_id')->unsigned();
            $table->foreign('provider_id')->references('id')->on('providers');
            $table->foreign('employee_id')->references('id')->on('employees');
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
        Schema::dropIfExists('purchase_orders');
    }
}
