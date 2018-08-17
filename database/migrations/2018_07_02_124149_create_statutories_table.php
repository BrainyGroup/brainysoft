<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatutoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statutories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->integer('organization_id')->unsigned()->foreign()->references('id')->on('organizations');
            $table->integer('company_id')->unsigned()->foreign()->references('id')->on('companies');
            $table->decimal('employee',4,3); //Employee ratio
            $table->decimal('employer',4,3); //Employer ratio
            $table->decimal('total',4,3); //Total ratio
            $table->date('date_required'); //Date to be filled
            $table->integer('statutory_type_id')->unsigned()->foreign()->references('id')->on('statutory_types');  //HI,WCF or NSF
            $table->boolean('before_paye')->defualt('false');          
            $table->integer('base_id')->unsigned()->foreign()->references('id')->on('salary_bases');
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
        Schema::dropIfExists('statutories');
    }
}
