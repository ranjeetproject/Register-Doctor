<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCancelToPatientCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient_cases', function (Blueprint $table) {
            $table->string('cancel_by',11)->after('doctor_reply')->nullable();
            $table->string('cancel_date',20)->after('cancel_by')->nullable();
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
            $table->dropColumn(['cancel_by','cancel_date']);
        });
    }
}
