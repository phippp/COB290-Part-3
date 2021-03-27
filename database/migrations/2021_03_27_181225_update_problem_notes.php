<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProblemNotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('problem_notes', function (Blueprint $table){
            $table->dropForeign('problem_notes_caller_id_foreign');
            $table->dropForeign('problem_notes_call_received_by_foreign');
            $table->dropColumn('call_received_by');
            $table->dropColumn('caller_id');
            $table->mediumText('solution')->nullable();
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
    }
}
