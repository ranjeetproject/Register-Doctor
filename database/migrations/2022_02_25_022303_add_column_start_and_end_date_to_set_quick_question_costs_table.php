<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnStartAndEndDateToSetQuickQuestionCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('set_quick_question_costs', function (Blueprint $table) {
            $table->date('quick_question_costs_start_date')->after('set_quick_question_cost')->nullable();
            $table->date('quick_question_costs_end_date')->after('quick_question_costs_start_date')->nullable();

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
            $table->dropColumn('quick_question_costs_start_date');
            $table->dropColumn('quick_question_costs_end_date');


        });
    }
}