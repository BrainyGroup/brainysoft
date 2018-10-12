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
            $table->string('logo')->nullable();
            $table->string('website')->nullable();
            $table->string('tin')->nullable();
            $table->string('vrn')->nullable();
            $table->string('regno')->nullable();
            $table->text('slogan')->nullable();
            $table->text('mission')->nullable();
            $table->text('vision')->nullable();           
            $table->integer('usage_count');
            $table->date('last_renew_date');
            $table->date('trial_expire_date');
            $table->integer('employees');
            $table->decimal('balance',9,2);
          
            $table->date('expire_date');
            $table->boolean('trial');
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
