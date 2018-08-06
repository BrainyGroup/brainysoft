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
            $table->decimal('salary',11,2);
            $table->decimal('nsf_employee',11,2);
            $table->decimal('nsf_employer',11,2);
            $table->decimal('nsf_total',11,2);
            $table->decimal('hi_employee',11,2);
            $table->decimal('hi_employer',11,2);
            $table->decimal('hi_total',11,2);
            $table->decimal('allowance',11,2);
            $table->decimal('taxable',11,2);
            $table->decimal('gloss',11,2);
            $table->decimal('paye',11,2);
            $table->decimal('sdl',11,2);
            $table->decimal('wcf',11,2);
            $table->decimal('contribution',11,2);
            $table->decimal('loan',11,2);
            $table->decimal('other',11,2);
            $table->decimal('net',11,2);
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
