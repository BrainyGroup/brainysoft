<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('country_code');
            $table->string('flag');
            $table->string('currency_code');
            $table->string('currency_name');
            $table->string('capital');
            $table->string('language_code');
            $table->string('language');
            $table->string('map');
            $table->string('google_cordinate');
            $table->integer('company_count');
            $table->integer('system_users');
            $table->integer('employees');
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
        Schema::dropIfExists('countries');
    }
}
