<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllowancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allowances', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('amount',11,2);
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('employee_id')->unsigned()->foreign()->references('id')->on('employees');
            $table->integer('company_id')->unsigned()->foreign()->references('id')->on('companies');
            $table->integer('allowance_type_id')->unsigned()->foreign()->references('id')->on('allowance_types');
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
        Schema::dropIfExists('allowances');
    }
}
