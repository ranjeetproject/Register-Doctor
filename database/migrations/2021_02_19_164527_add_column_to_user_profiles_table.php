<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_profiles', function (Blueprint $table) {
            $table->string('telephone1')->after('about')->nullable();
            $table->string('telephone2')->after('telephone1')->nullable();
            $table->string('gp_name')->after('telephone2')->nullable();
            $table->text('gp_address')->after('gp_name')->nullable();
            $table->string('gp_email')->after('gp_address')->nullable();
            $table->string('n_of_kin_name')->after('gp_email')->nullable();
            $table->text('n_of_kin_address')->after('n_of_kin_name')->nullable();
            $table->string('n_of_kin_relationship')->after('n_of_kin_address')->nullable();
            $table->string('n_of_kin_phone')->after('n_of_kin_relationship')->nullable();
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
            $table->dropColumn('telephone1');
            $table->dropColumn('telephone2');
            $table->dropColumn('gp_name');
            $table->dropColumn('gp_address');
            $table->dropColumn('gp_email');
            $table->dropColumn('n_of_kin_name');
            $table->dropColumn('n_of_kin_address');
            $table->dropColumn('n_of_kin_relationship');
            $table->dropColumn('n_of_kin_phone');
        });
    }
}
