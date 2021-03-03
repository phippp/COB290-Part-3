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
        Schema::create('SpecialistSkills', function (Blueprint $table) {
            $table->foreign('problemTypeId')->references('problemTypeId')->on('Problem');   //problemTypeId
            $table->foreign('empId')->references('employeeId')->on('Employee');             //empId
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('SpecialistSkills');
    }
}
