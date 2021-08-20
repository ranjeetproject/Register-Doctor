<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPrescriptionNoAndStatusToPrescription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prescription', function (Blueprint $table) {
            $table->string('prescription_no',100)->after('comments')->nullable();
            $table->enum('status', ['no', 'y'])->after('prescription_no')->default('no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prescription', function (Blueprint $table) {
            $table->dropColumn(['prescription_no','status']);
        });
    }
}
