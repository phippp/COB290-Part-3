<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Employee', function (Blueprint $table) {
            $table->uuid('employeeId')->primary();                                  //employeeId
            $table->string('forename');                                             //forename
            $table->string('surname');                                              //surname
            $table->string('emailAddress')->unique();                               //emailAddress
            $table->integer('jobId')->unsigned();                                   //jobId
            $table->foreign('jobId')->references('jobId')->on('Job');               //jobId - constraint
            $table->integer('branchId')->unsigned();                                //branchId
            $table->foreign('branchId')->references('branchId')->on('Branch');      //branchId - constraint
            $table->string('phoneNumberExtension');                                 //phoneNumberExtension
            $table->string('language');                                             //language
            $table->timestamps();                                                   //created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Employee');
    }
}
