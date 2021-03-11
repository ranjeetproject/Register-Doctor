<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAccountDetailsToUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_profiles', function (Blueprint $table) {
             $table->string('location')->after('address')->nullable();
             $table->string('account_number')->after('dr_qa_fee_notification')->nullable();
             $table->string('sort_code')->after('account_number')->nullable();
             $table->string('bank_name')->after('sort_code')->nullable();
             $table->string('account_name')->after('bank_name')->nullable();
             $table->string('iban_or_swift_code')->after('account_name')->nullable();
             $table->string('telephone3')->after('telephone2')->nullable();
             $table->string('website')->after('telephone3')->nullable();
             $table->string('dr_see')->after('dr_qa_fee_notification')->nullable();
             $table->string('dr_signature')->after('dr_see')->nullable();
             $table->tinyInteger('dr_ratings_comments')->after('dr_signature')->default('1')->comment('1:active, 0:inactive');
             $table->string('dr_turnaround_time')->after('dr_signature')->nullable();
             
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
            $table->dropColumn('location');
            $table->dropColumn('account_number');
            $table->dropColumn('sort_code');
            $table->dropColumn('bank_name');
            $table->dropColumn('account_name');
            $table->dropColumn('iban_or_swift_code');
            $table->dropColumn('telephone3');
            $table->dropColumn('website');
            $table->dropColumn('dr_see');
            $table->dropColumn('dr_signature');
            $table->dropColumn('dr_ratings_comments');
            $table->dropColumn('dr_turnaround_time');
        });
    }
}
