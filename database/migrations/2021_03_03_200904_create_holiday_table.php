<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHolidayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Holiday', function (Blueprint $table) {
            $table->uuid('leaveId');                                                //leaveId
            $table->date('startDate');                                              //startDate
            $table->date('endDate');                                                //endDate
            $table->string('reason');                                               //reason
            $table->foreign('empId')->references('employeeId')->on('Employee');     //empId
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Holiday');
    }
}
