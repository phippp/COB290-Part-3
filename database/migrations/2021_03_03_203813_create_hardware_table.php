<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHardwareSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Hardware', function (Blueprint $table) {
            $table->uuid('serialNum')->primary();               //serialNum
            $table->string('name');                             //name
            $table->string('type');                             //type
            $table->string('make');                             //make
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Hardware');
    }
}
