<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserColumnToProblemLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('problem_logs', function (Blueprint $table) {
            $table->foreignId('client_id')
            ->references('id')->on('employees')
            ->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('problem_logs', function (Blueprint $table) {
            $table->dropColumn('client_id');
        });

    }
}
