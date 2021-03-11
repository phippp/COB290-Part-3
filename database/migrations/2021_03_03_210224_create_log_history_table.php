<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_histories', function (Blueprint $table) {
            $table->id();                                                               //id
            $table->string('description');                                              //description
            $table->string('solution')->nullable();                                     //solution
            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();;        //employee_id (edited_by)
            $table->timestamp('edited_at');                                             //edited_at
            $table->foreignId('problem_log_id')
            ->references('id')->on('problem_logs')
            ->constrained()->cascadeOnDelete();                                         //problem_log_id
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_histories');
    }
}
