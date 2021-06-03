<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrugsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drugs_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('patient_case_id')->nullable();
            $table->string('drug_name')->nullable();
            $table->string('dose')->nullable();
            $table->string('frequency')->nullable();
            $table->tinyInteger('currently_taking')->default('1')->comment('1:yes, 2:no');
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
        Schema::dropIfExists('drugs_details');
    }
}
