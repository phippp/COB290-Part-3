<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHolidayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holidays', function (Blueprint $table) {
            $table->id();                                                           //id
            $table->date('start_date');                                             //startDate
            $table->date('end_date');                                               //endDate
            $table->string('reason');                                               //reason
            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();     //employee_id
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('holidays');
    }
}
