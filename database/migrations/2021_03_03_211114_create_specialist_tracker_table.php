<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialistTrackerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SpecialistTracker', function (Blueprint $table) {
            $table->id();                                                                               //id
            $table->foreign('empId')->references('employeeId')->on('Employee');                         //empId
            $table->timestamp('assignedAt');                                                            //assignedAt
            $table->string('reason');                                                                   //reason
            $table->foreign('problemId')->references('problemId')->on('ProblemLog');                    //problemId
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('SpecialistTracker');
    }
}
