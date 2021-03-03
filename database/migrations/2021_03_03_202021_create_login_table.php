<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Login', function (Blueprint $table) {
            $table->string('username');                                             //username
            $table->string('passwordHash');                                         //passwordHash
            $table->foreignId('empId');                                             //empId
            $table->foreign('empId')->references('employeeId')->on('Employee');     //empId - constraint
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('login');
    }
}
