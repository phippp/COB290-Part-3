<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameLogHistories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('log_histories','call_logs');
        Schema::table('call_logs', function (Blueprint $table){
            $table->foreignId('specialist_id')
            ->references('id')->on('employees')
            ->constrained()->cascadeOnDelete()->nullable();
            $table->foreignId('client_id')
            ->references('id')->on('employees')
            ->constrained()->cascadeOnDelete()->nullable();
            $table->dropColumn('solution');
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('call_log', function (Blueprint $table) {
            $table->dropForeign('call_log_client_id_foreign');
            $table->dropForeign('call_log_specialist_id_foreign');
            $table->dropColumn('client_id');
            $table->dropColumn('specialist_id');
        });
    }
}
