<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNullValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('problem_logs', function (Blueprint $table){
            $table->foreignId('hardware_id')->default(null)->change();
            $table->foreignId('software_id')->default(null)->change();
            $table->foreignId('operating_system_id')->default(null)->change();
            $table->foreignId('employee_id')->default(null)->change();
            $table->dateTime('solved_at')->default(null)->change();
            $table->boolean('specialist_assigned')->default(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
