<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CretatePurchaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('purchase_deatails', function(Blueprint $table){
           $table->increments('id');
           $table->integer('requested_amount');
           $table->float('unit_value');
           $table->float('discount');
           $table->integer('purchase_order_id')->unsigned();
           $table->integer('product_id')->unsigned();
           $table->foreign('purchase_order_id')->references('id')->on('purchase_orders');
           $table->foreign('product_id')->references('id')->on('products');
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
        Schema::dropIfExists('purchase_details');
    }
}
