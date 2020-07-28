<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('designation_id')->unsigned()->foreign()->references('id')->on('designations');
            $table->integer('identity')->unsigned()->unique();
            $table->integer('user_id')->unsigned()->foreign()->references('id')->on('users');
            $table->integer('company_id')->unsigned()->foreign()->references('id')->on('companies');
            $table->integer('center_id')->unsigned()->foreign()->references('id')->on('centers');
            $table->integer('department_id')->unsigned()->foreign()->references('id')->on('departments');
            $table->string('account_number');          
            $table->integer('bank_id')->unsigned()->foreign()->references('id')->on('banks');
            $table->date('start_date');
            $table->date('end_date');
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
