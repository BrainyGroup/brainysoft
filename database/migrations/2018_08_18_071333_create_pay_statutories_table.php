<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayStatutoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_statutories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned()->foreign()->references('id')->on('companies');
            $table->integer('employee_id')->unsigned()->foreign()->references('id')->on('employees');
            $table->integer('pay_id')->unsigned()->foreign()->references('id')->on('pays');
            $table->integer('pay_number');
            $table->decimal('employee',11,2);
            $table->decimal('employer',11,2);
            $table->decimal('total',11,2);
            $table->integer('statutory_id');
            $table->string('employee_statutory_no');
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
        Schema::dropIfExists('pay_statutories');
    }
}
