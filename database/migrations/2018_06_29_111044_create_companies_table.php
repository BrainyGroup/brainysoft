<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id')->unsigned()->foreign()->references('id')->on('countries');
            $table->string('name');
            $table->text('description');
            $table->string('logo');
            $table->string('website');
            $table->string('tin');
            $table->string('vrn');
            $table->string('regno');
            $table->text('slogan');
            $table->text('mission');
            $table->text('vision');
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
        Schema::dropIfExists('companies');
    }
}
