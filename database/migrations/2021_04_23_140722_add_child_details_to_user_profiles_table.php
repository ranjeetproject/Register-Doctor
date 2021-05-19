<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChildDetailsToUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_profiles', function (Blueprint $table) {
           


            $table->string('first_account_holder')->after('iban_or_swift_code')->nullable();
            $table->string('relationship_fch')->after('first_account_holder')->nullable();
            $table->string('address_fch')->after('relationship_fch')->nullable();
            $table->string('email_fch')->after('address_fch')->nullable();
            $table->string('telephone1_fch')->after('email_fch')->nullable();
            $table->string('telephone2_fch')->after('telephone1_fch')->nullable();
            $table->string('second_account_holder')->after('telephone2_fch')->nullable();
            $table->string('relationship_sch')->after('second_account_holder')->nullable();
            $table->string('address_sch')->after('relationship_sch')->nullable();
            $table->string('email_sch')->after('address_sch')->nullable();
            $table->string('telephone1_sch')->after('email_sch')->nullable();
            $table->string('telephone2_sch')->after('telephone1_sch')->nullable();

            $table->string('house_no_or_name')->after('telephone2_sch')->nullable();
            $table->string('street')->after('house_no_or_name')->nullable();
            $table->string('area')->after('street')->nullable();
            $table->string('city')->after('area')->nullable();
            $table->string('state')->after('city')->nullable();
            $table->string('country')->after('state')->nullable();
            $table->string('pincode')->after('country')->nullable();

            $table->unsignedBigInteger('added_by')->after('pincode')->nullable();
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
             $table->dropColumn('first_account_holder');
             $table->dropColumn('relationship_fch');
             $table->dropColumn('address_fch');
             $table->dropColumn('email_fch');
             $table->dropColumn('telephone1_fch');
             $table->dropColumn('telephone2_fch');
             $table->dropColumn('second_account_holder');
             $table->dropColumn('relationship_sch');
             $table->dropColumn('address_sch');
             $table->dropColumn('email_sch');
             $table->dropColumn('telephone1_sch');
             $table->dropColumn('telephone2_sch');
             $table->dropColumn('house_no_or_name');
             $table->dropColumn('street');
             $table->dropColumn('area');
             $table->dropColumn('city');
             $table->dropColumn('state');
             $table->dropColumn('country');
             $table->dropColumn('pincode');
             $table->dropColumn('added_by');
        });
    }
}
