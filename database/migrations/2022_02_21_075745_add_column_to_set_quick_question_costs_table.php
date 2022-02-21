<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToSetQuickQuestionCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('set_quick_question_costs', function (Blueprint $table) {
            $table->string('set_quick_question_time')->after('set_quick_question_cost')->nullable();
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
            $table->dropColumn('set_quick_question_time');
        });
    }
}