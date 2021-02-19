<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDrColumnToUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_profiles', function (Blueprint $table) {
            $table->string('dr_speciality')->after('n_of_kin_phone')->nullable();
            $table->string('dr_experience')->after('dr_speciality')->nullable();
            $table->string('dr_qualifications')->after('dr_experience')->nullable();
            $table->string('dr_medical_license_no')->after('dr_qualifications')->nullable();
            $table->string('dr_name_of_medical_licencer')->after('dr_medical_license_no')->nullable();
            $table->string('dr_registered_no')->after('dr_name_of_medical_licencer')->nullable();
            $table->float('dr_standard_fee', 8, 2)->after('dr_registered_no')->default(0.00);
            $table->tinyInteger('dr_standard_fee_notification')->after('dr_standard_fee')->default('1')->comment('1:active, 0:inactive');
            $table->float('dr_live_video_fee', 8, 2)->after('dr_standard_fee_notification')->default(0.00);
            $table->tinyInteger('dr_live_video_fee_notification')->after('dr_live_video_fee')->default('1')->comment('1:active, 0:inactive');
            $table->float('dr_live_chat_fee', 8, 2)->after('dr_live_video_fee_notification')->default(0.00);
            $table->tinyInteger('dr_live_chat_fee_notification')->after('dr_live_chat_fee')->default('1')->comment('1:active, 0:inactive');
            $table->float('dr_qa_fee', 8, 2)->after('dr_live_chat_fee_notification')->default(0.00);
            $table->tinyInteger('dr_qa_fee_notification')->after('dr_qa_fee')->default('1')->comment('1:active, 0:inactive');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_profiles', function (Blueprint $table) {
            $table->dropColumn('dr_speciality');
            $table->dropColumn('dr_experience');
            $table->dropColumn('dr_qualifications');
            $table->dropColumn('dr_medical_license_no');
            $table->dropColumn('dr_name_of_medical_licencer');
            $table->dropColumn('dr_registered_no');
            $table->dropColumn('dr_standard_fee');
            $table->dropColumn('dr_standard_fee_notification');
            $table->dropColumn('dr_live_video_fee');
            $table->dropColumn('dr_live_video_fee_notification');
            $table->dropColumn('dr_live_chat_fee');
            $table->dropColumn('dr_live_chat_fee_notification');
            $table->dropColumn('dr_qa_fee');
            $table->dropColumn('dr_qa_fee_notification');
        });
    }
}
