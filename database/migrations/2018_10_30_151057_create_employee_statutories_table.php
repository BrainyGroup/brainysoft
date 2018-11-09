<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeStatutoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_statutories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->unsigned()->foreign()->references('id')->on('employees');
            $table->integer('statutory_id')->unsigned()->foreign()->references('id')->on('statutories');           
            $table->integer('company_id')->unsigned()->foreign()->references('id')->on('companies');           
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
        Schema::dropIfExists('employee_statutories');
    }
}
