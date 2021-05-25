<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMedicineNameToPatientCaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient_cases', function (Blueprint $table) {
             $table->text('medicine_name')->after('questions')->nullable();
             $table->tinyInteger('case_type')->after('questions_type')->default(1)->comment('1: normal booking, 2:prescriptions');
             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patient_cases', function (Blueprint $table) {
             $table->dropColumn('medicine_name');
             $table->dropColumn('case_type');
        });
    }
}
