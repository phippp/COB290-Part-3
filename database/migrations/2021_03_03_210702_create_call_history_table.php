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
        Schema::create('problem_notes', function (Blueprint $table) {
            $table->id();                                                                       //id
            $table->timestamps();                                                               //created_at and updated_at
            $table->string('description');                                                      //description
            $table->foreignId('call_received_by')
            ->references('id')->on('employees')
            ->constrained()->cascadeOnDelete()->nullable();                                     //call_received_by
            $table->foreignId('caller_id')
            ->references('id')->on('employees')
            ->constrained()->cascadeOnDelete()->nullable();                                     //caller_id
            $table->foreignId('problem_log_id')
            ->references('id')->on('problem_logs')
            ->constrained()->cascadeOnDelete();                                                 //problem_log_id
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('problem_notes');
    }
}
