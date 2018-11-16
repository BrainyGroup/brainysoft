<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayAllowancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_allowances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned()->foreign()->references('id')->on('companies');
            $table->integer('employee_id')->unsigned()->foreign()->references('id')->on('employees');
            $table->integer('pay_id')->unsigned()->foreign()->references('id')->on('pays');
            $table->integer('pay_number');
            $table->integer('allowance_id');
            $table->decimal('amount',11,2);          
            $table->integer('allowance_type_id');
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
        Schema::dropIfExists('pay_allowances');
    }
}
