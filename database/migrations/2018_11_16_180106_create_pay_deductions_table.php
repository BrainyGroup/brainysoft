<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayDeductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_deductions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned()->foreign()->references('id')->on('companies');
            $table->integer('employee_id')->unsigned()->foreign()->references('id')->on('employees');
            $table->integer('pay_id')->unsigned()->foreign()->references('id')->on('pays');
            $table->integer('pay_number');
            $table->integer('deduction_id');
            $table->decimal('amount',11,2);          
            $table->integer('deduction_type_id');
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
        Schema::dropIfExists('pay_deductions');
    }
}
