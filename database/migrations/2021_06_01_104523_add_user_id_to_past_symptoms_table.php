<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToPastSymptomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('past_symptoms', function (Blueprint $table) {
             $table->unsignedBigInteger('user_id')->after('id')->nullable();
             $table->tinyInteger('type')->after('symptom')->nullable()->comment('1:old,2:new');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('past_symptoms', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('type');
        });
    }
}
