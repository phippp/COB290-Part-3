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
            $table->foreign('hardwareSerialNumber')->references('serialNum')->on('Hardware')->nullable();       //hardwareSerialNumber
            $table->foreign('softwareId')->references('softwareId')->on('Software')->nullable();                //softwareId
            $table->boolean('specialistAssigned');                                                              //specialistAssigned
            $table->foreign('operatingSystemId')->references('id')->on('OperatingSystem')->nullable();          //operatingSystemId
            $table->foreign('problemTypeId')->references('problemTypeId')->on('Problem')->nullable();           //problemTypeId
            $table->string('problemTitle');                                                                     //problemTitle
            $table->string('problemDescription');                                                               //problemDescription
            $table->string('status');                                                                           //status
            $table->string('importanceLevel');                                                                  //importanceLevel
            $table->timestamps();                                                                               //created_at and updated_at
            $table->dateTime('solvedAt')->nullable();                                                           //solvedAt
            $table->foreign('solvedBy')->references('employeeId')->on('Employee')->nullable();                  //solvedBy
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
