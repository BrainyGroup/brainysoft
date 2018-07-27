<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id')->unsigned()->foreign()->references('id')->on('countries');          
            $table->decimal('minimum',12,2);
            $table->decimal('maximum',12,2);
            $table->decimal('ratio',4,3);
            $table->decimal('offset',9,2);
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
        Schema::dropIfExists('payes');
    }
}
