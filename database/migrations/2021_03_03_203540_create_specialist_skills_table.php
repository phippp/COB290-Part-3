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
            $table->integer('problemTypeId')->unsigned();                                   //problemTypeId
            $table->foreign('problemTypeId')->references('problemTypeId')->on('Problem');   //problemTypeId - constraint
            $table->integer('empId')->unsigned();                                           //empId
            $table->foreign('empId')->references('employeeId')->on('Employee');             //empId - constraint
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
