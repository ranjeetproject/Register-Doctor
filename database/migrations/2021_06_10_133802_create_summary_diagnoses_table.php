<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSummaryDiagnosesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summary_diagnoses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('patient_case_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->text('summary_diagnose')->nullable();
            $table->text('future_reference')->nullable();
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
        Schema::dropIfExists('summary_diagnoses');
    }
}
