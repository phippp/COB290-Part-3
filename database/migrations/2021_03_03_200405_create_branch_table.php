<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Branch', function (Blueprint $table) {
            $table->uuid('branchId')->primary();            //branchId
            $table->string('addressLine1');                 //addressLine1
            $table->string('addressLine2');                 //addressLine2
            $table->string('city');                         //city
            $table->string('country');                      //country
            $table->string('postCode');                     //postCode
            $table->string('phoneNumberBase');              //phoneNumberBase
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Branch');
    }
}
