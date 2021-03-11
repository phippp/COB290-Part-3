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
        Schema::create('specialist_trackers', function (Blueprint $table) {
            $table->id();                                                                               //id
            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();                         //employee_id
            $table->timestamps();                                                                       //created_at and updated_at
            $table->string('reason');                                                                   //reason
            $table->foreignId('problem_log_id')
            ->references('id')->on('problem_logs')
            ->constrained()->cascadeOnDelete();                                                         //problem_log_id
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specialist_trackers');
    }
}
