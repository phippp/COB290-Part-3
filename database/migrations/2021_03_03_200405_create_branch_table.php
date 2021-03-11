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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();                                   //id
            $table->string('address_line_1');               //address_line_1
            $table->string('address_line_2');               //address_line_2
            $table->string('city');                         //city
            $table->string('country');                      //country
            $table->string('postcode');                     //postCode
            $table->string('phone_number_base');            //phone_number_base
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branches');
    }
}
