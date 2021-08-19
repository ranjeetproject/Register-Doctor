<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DoctorPaitentRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescription_req_doctor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('case_id', 111);
            $table->string('priscription_id', 111);
            $table->tinyInteger('status')->default('1')->comment('1:active, 2:inactive');
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
        Schema::dropIfExists('prescription_req_doctor');
    }
}
