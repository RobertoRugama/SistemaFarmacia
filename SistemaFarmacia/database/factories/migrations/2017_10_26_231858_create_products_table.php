<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
        $table->increments('id');

        $table->boolean('status');
        $table->string('name');
        $table->string('presentation');
        $table->string('description');
        $table->integer('existence');
        $table->string('reference');
        $table->double('unit_price')->nullable();

        $table->integer('provider_id')->unsigned();
        $table->integer('laboratory_id')->unsigned();
        $table->integer('category_id')->unsigned();

        $table->foreign('provider_id')->references('id')->on('providers');
        $table->foreign('laboratory_id')->references('id')->on('laboratories');
        $table->foreign('category_id')->references('id')->on('categories');
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