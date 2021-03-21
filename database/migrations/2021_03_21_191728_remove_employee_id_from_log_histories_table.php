<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveEmployeeIdFromLogHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('log_histories', function (Blueprint $table) {
            $table->dropForeign('log_histories_employee_id_foreign'); // this drops the foreign key
            $table->dropColumn('employee_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('log_histories', function (Blueprint $table) {
            //
        });
    }
}
