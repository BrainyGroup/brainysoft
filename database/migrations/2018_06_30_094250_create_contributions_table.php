<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contributions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');          
            $table->integer('employee_id')->unsigned()->foreign()->references('id')->on('employees');
            $table->decimal('employee',4,3); //Employee ratio
            $table->decimal('employer',4,3); //Employer ratio
            $table->decimal('total',4,3); //Total ratio
            $table->date('date_required'); //Date to be filled
            $table->string('type');  //HI,WCF or NSF
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
        Schema::dropIfExists('contributions');
    }
}
