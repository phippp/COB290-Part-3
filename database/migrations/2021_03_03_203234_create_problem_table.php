<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProblemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Problem', function (Blueprint $table) {
            $table->uuid('problemTypeId')->primary();               //problemTypeId
            $table->string('problemType');                          //problemType
            $table->string('problemGenericType')->nullable();       //problemGenericType
            $table->boolean('enabled');                             //enabled
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Problem');
    }
}
