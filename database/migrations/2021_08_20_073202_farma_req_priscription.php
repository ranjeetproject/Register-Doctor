<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FarmaReqPriscription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharma_req_prescription', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('case_id', 111);
            $table->string('priscription_id', 111);
            $table->integer('pharma_id');
            $table->tinyInteger('send_status')->default('1')->comment('1:yes, 2:no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pharma_req_prescription');
    }
}
