<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Specialist', function (Blueprint $table) {
            $table->uuid('specialistId')->primary();                                                    //specialistId
            $table->foreign('empId')->references('employeeId')->on('Employee');                         //empId
            $table->boolean('isAvailable');                                                             //isAvailable
            $table->string('workingDays');                                                              //workingDays
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Specialist');
    }
}
