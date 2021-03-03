<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoftwareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Software', function (Blueprint $table) {
            $table->id('softwareId')->unsigned();               //softwareId
            $table->string('softwareName');                     //softwareName
            $table->string('softwareVersion');                  //softwareVersion
            $table->string('licenseKey');                       //licenseKey
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Software');
    }
}
