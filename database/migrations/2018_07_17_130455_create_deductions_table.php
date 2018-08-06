<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deductions', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('amount',11,2);
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('employee_id')->unsigned()->foreign()->references('id')->on('employees');
            $table->integer('deduction_type_id')->unsigned()->foreign()->references('id')->on('deduction_types');            
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
        Schema::dropIfExists('deductions');
    }
}
