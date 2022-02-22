<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnQQDoctorToSetQuickQuestionCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('set_quick_question_costs', function (Blueprint $table) {
            $table->string('set_quick_question_time_doctor')->after('set_quick_question_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('set_quick_question_costs', function (Blueprint $table) {
            $table->dropColumn('set_quick_question_time_doctor');
        });
    }
}