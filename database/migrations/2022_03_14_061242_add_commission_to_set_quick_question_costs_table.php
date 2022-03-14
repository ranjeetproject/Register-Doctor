<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCommissionToSetQuickQuestionCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('set_quick_question_costs', function (Blueprint $table) {
            $table->string('commission',8)->nullable()->after('set_quick_question_time_doctor');
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
            $table->dropColumn('commission');
        });
    }
}
