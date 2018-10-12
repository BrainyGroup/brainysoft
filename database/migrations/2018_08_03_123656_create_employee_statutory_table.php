<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeStatutoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_statutory', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->unsigned()->foreign()->references('id')->on('employees');
            $table->integer('statutory_id')->unsigned()->foreign()->references('id')->on('statutories');
            $table->integer('organization_id')->unsigned()->foreign()->references('id')->on('organizations');
            $table->integer('statutory_type_id')->unsigned()->foreign()->references('id')->on('statutory_types');
            $table->integer('company_id')->unsigned()->foreign()->references('id')->on('companies');
            // $table->unique(['employee_id', 'statutory_type_id']);
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
        Schema::dropIfExists('employee_statutory');
    }
}
