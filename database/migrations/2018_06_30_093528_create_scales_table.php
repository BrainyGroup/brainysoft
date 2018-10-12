<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned()->foreign()->references('id')->on('companies');
            $table->string('name');
            $table->text('description');
            $table->decimal('minimum',11,2);
            $table->decimal('maximum',11,2);
            $table->integer('employment_type_id')->unsigned()->foreign()->references('id')->on('employment_types');
            $table->integer('payroll_group_id')->unsigned()->foreign()->references('id')->on('payroll_groups');
            $table->integer('pay_base_id')->unsigned()->foreign()->references('id')->on('pay_bases');
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
        Schema::dropIfExists('scales');
    }
}
