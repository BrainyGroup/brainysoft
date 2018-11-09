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
            $table->integer('usage_count')->nullable();
            $table->date('last_renew_date')->nullable();
            $table->date('trial_expire_date')->nullable();
            $table->integer('employees')->nullable();
            $table->decimal('balance',9,2)->nullable();
          
            $table->date('expire_date')->nullable();
            $table->boolean('trial')->nullable();
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
