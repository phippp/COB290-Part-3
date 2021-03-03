<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Job', function (Blueprint $table) {
            $table->uuid('jobId')->primary();       //jobId
            $table->string('jobTitle');             //jobTitle
            $table->string('jobType');              //jobType
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Job');
    }
}
