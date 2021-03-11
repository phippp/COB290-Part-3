<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialistSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialist_skills', function (Blueprint $table) {
            $table->foreignId('problem_id')->constrained()->cascadeOnDelete();              //problem_id
            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();             //employee_id
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specialist_skills');
    }
}
