<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatutoryPaymentHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statutory_payment_history', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned()->foreign()->references('id')->on('companies');          
            $table->integer('statutory_id')->unsigned()->foreign()->references('id')->on('statutories'); 
            $table->integer('pay_number');
            $table->integer('month');
            $table->integer('year');
            $table->decimal('amount',11,2);
            $table->date('pay_date'); 
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
        Schema::dropIfExists('statutory_payment_history');
    }
}
