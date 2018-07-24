<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned()->foreign()->references('id')->on('companies');
            $table->integer('scale_id')->unsigned()->foreign()->references('id')->on('scales');
            $table->integer('center_id')->unsigned()->foreign()->references('id')->on('centers');
            $table->integer('user_id')->unsigned()->foreign()->references('id')->on('users');
            $table->integer('employee_id')->unsigned()->foreign()->references('id')->on('employees');
            $table->decimal('amount',9,2);            
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
        Schema::dropIfExists('salaries');
    }
}
