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
            $table->foreignId('callReceivedBy');                                                //callReceivedBy
            $table->foreign('callReceivedBy')->references('employeeId')->on('Employee');        //callReceivedBy - constraint
            $table->foreignId('callerId');                                                      //callerId
            $table->foreign('callerId')->references('employeeId')->on('Employee');              //callerId - constraint
            $table->foreignId('problemId');                                                     //problemId
            $table->foreign('problemId')->references('problemId')->on('ProblemLog');            //problemId - constraint
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
