<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CallHistory', function (Blueprint $table) {
            $table->id();                                                                       //id
            $table->timestamp('timeOfCall');                                                    //timeOfCall
            $table->string('description');                                                      //description
            $table->foreign('callReceivedBy')->references('employeeId')->on('Employee');        //callReceivedBy
            $table->foreign('callerId')->references('employeeId')->on('Employee');              //callerId
            $table->foreign('problemId')->references('problemId')->on('ProblemLog');            //problemId
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('CallHistory');
    }
}
