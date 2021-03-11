<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();                                                           //id
            $table->string('forename');                                             //forename
            $table->string('surname');                                              //surname
            $table->string('email_address')->unique();                              //email_address
            $table->foreignId('job_id')->constrained()->cascadeOnDelete();          //job_id -> fk
            $table->foreignId('branch_id')->constrained()->cascadeOnDelete();       //branch_id -> fk
            $table->string('phone_number_extension');                               //phone_number_extension
            $table->string('language');                                             //language
            $table->timestamps();                                                   //created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
