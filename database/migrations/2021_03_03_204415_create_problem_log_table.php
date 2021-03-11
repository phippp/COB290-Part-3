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
        Schema::create('problem_logs', function (Blueprint $table) {
            $table->id();                                                                                   //id
            $table->foreignId('hardware_id')->nullable()->constrained()->cascadeOnDelete();;                //hardware_id
            $table->foreignId('software_id')->nullable() ->constrained()->cascadeOnDelete();;               //software_id
            $table->boolean('specialist_assigned');                                                         //specialist_assigned
            $table->foreignId('operating_system_id')->nullable()->constrained()->cascadeOnDelete();;        //operating_system_id
            $table->foreignId('problem_id')->nullable()->constrained()->cascadeOnDelete();;                 //problem_id
            $table->string('title');                                                                        //title
            $table->string('description');                                                                  //description
            $table->string('status');                                                                       //status
            $table->string('importance');                                                                   //importance
            $table->timestamps();                                                                           //created_at and updated_at
            $table->dateTime('solved_at')->nullable();                                                      //solved_at
            $table->foreignId('employee_id')->nullable()->constrained()->cascadeOnDelete();;                //employee_id (solved_by)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('problem_logs');
    }
}
