<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pays', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned()->foreign()->references('id')->on('companies');
            $table->integer('employee_id')->unsigned()->foreign()->references('id')->on('employees');
            $table->date('run_date');
            $table->boolean('posted')->default(false);
            $table->integer('year');
            $table->integer('month');
            $table->integer('pay_number');
            $table->decimal('basic_salary',11,2);
            $table->decimal('allowance',11,2);
            $table->decimal('gloss',11,2);
            $table->decimal('taxable',11,2);
            $table->decimal('paye',11,2);  
            $table->decimal('statutory_after_paye',11,2);          
            $table->decimal('monthly_earning',11,2);
            $table->decimal('deduction',11,2);
            $table->decimal('net',11,2); 
            $table->decimal('net_balance',11,2);           
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
        Schema::dropIfExists('pays');
    }
}
