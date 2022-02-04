<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReadToPharmaReqPrescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pharma_req_prescription', function (Blueprint $table) {
            $table->tinyInteger('read')->default(0)->comment('0:Normal;1:Read')->after('send_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pharma_req_prescription', function (Blueprint $table) {
            $table->dropColumn('read');
        });
    }
}
