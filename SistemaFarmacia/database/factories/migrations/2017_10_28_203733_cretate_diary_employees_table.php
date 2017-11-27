<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CretateDiaryEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('diary_employees', function(Blueprint $table){
           $table->increments('id');
           $table->boolean('status');
           $table->char('type_phone',2);
           $table->char('phone',8);
           $table->integer('employee_id')->unsigned();
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
        Schema::dropIfExists('diary_employees');
    }
}
