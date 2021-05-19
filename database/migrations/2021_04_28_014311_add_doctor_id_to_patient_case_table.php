<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDoctorIdToPatientCaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient_cases', function (Blueprint $table) {
            $table->unsignedBigInteger('doctor_id')->after('case_id')->nullable();
            $table->tinyInteger('questions_type')->after('questions')->comment('1:live chat, 2:live video, 3:quick question, 4: book questions')->nullable();
            $table->date('booking_date')->after('questions_type')->nullable();
            $table->time('booking_time')->after('booking_date')->nullable();
            $table->string('time_duration')->after('booking_time')->nullable();
            $table->tinyInteger('accept_status')->after('status')->nullable();
            $table->tinyInteger('doctor_reply')->after('accept_status')->nullable();
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
             $table->dropColumn('doctor_id');
             $table->dropColumn('questions_type');
             $table->dropColumn('accept_status');
             $table->dropColumn('doctor_reply');
            
        });
    }
}
