<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProblemLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ProblemLog', function (Blueprint $table) {
            $table->uuid('problemId')->primary();                                                               //problemId
            $table->integer('hardwareSerialNumber')->unsigned()->nullable();                                    //hardwareSerialNumber
            $table->foreign('hardwareSerialNumber')->references('serialNum')->on('Hardware');                   //hardwareSerialNumber  - constraint
            $table->integer('softwareId')->unsigned()->nullable();                                              //softwareId
            $table->foreign('softwareId')->references('softwareId')->on('Software');                            //softwareId  - constraint
            $table->boolean('specialistAssigned');                                                              //specialistAssigned
            $table->integer('operatingSystemId')->unsigned()->nullable();                                       //operatingSystemId
            $table->foreign('operatingSystemId')->references('id')->on('OperatingSystem');                      //operatingSystemId  - constraint
            $table->integer('problemTypeId')->unsigned()->nullable();                                           //problemTypeId
            $table->foreign('problemTypeId')->references('problemTypeId')->on('Problem');                       //problemTypeId - constraint
            $table->string('problemTitle');                                                                     //problemTitle
            $table->string('problemDescription');                                                               //problemDescription
            $table->string('status');                                                                           //status
            $table->string('importanceLevel');                                                                  //importanceLevel
            $table->timestamps();                                                                               //created_at and updated_at
            $table->dateTime('solvedAt')->nullable();                                                           //solvedAt
            $table->integer('solvedBy')->unsigned()->nullable();                                                //solvedBy
            $table->foreign('solvedBy')->references('employeeId')->on('Employee');                              //solvedBy - constraint
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ProblemLog');
    }
}
