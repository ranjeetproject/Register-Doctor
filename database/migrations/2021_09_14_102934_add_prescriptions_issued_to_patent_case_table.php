<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPrescriptionsIssuedToPatentCaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient_cases', function (Blueprint $table) {
            $table->enum('prescriptions_issued', ['no', 'yes'])->default('no');
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
            $table->dropColumn(['prescriptions_issued']);
        });
    }
}
