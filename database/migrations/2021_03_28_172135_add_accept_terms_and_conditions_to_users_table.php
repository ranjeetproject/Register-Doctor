<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAcceptTermsAndConditionsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->timestamp('terms_conditions')->after('admin_verified_at')->nullable();
            $table->timestamp('privacy_policy')->after('terms_conditions')->nullable();
            $table->string('registration_number')->after('id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
             $table->dropColumn('terms_conditions');
             $table->dropColumn('privacy_policy');
             $table->dropColumn('registration_number');
        });
    }
}
