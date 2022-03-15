<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSickNoteIdToSickNotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sick_notes', function (Blueprint $table) {
            $table->string('sick_note_id', 20)->nullable()->after('case_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sick_notes', function (Blueprint $table) {
            $table->dropColumn('sick_note_id');
        });
    }
}
