<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSymptromsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('symptroms_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('patient_case_id')->nullable();
            $table->text('cond_not_covered')->nullable();
            $table->text('cond_not_covered2')->nullable();
            $table->text('details')->nullable();
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->text('doctor_to_know')->nullable();
            $table->string('gp_doctor_name')->nullable();
            $table->string('gp_doctor_address')->nullable();
            $table->tinyInteger('status')->default('1')->comment('1:active, 2:inactive');
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
        Schema::dropIfExists('symptroms_details');
    }
}
