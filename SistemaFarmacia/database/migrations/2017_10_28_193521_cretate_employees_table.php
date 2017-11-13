<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CretateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (BluePrint $table){
            $table->increments('id');
            $table->boolean('status');
            $table->datetime('date_register');
            $table->char('identification_card',16);
            $table->string('first_name',15);
            $table->string('second_name',15);
            $table->string('first_last_name',15);
            $table->string('second_first_last_name',15);
            $table->string('address',100);
            $table->string('user',20);
            $table->string('previleges',10);
            $table->integer('charge_id')->unsigned();
            $table->foreign('charge_id')->references('id')->on('charges');
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
        Schema::dropIfExists('employees');
    }
}
