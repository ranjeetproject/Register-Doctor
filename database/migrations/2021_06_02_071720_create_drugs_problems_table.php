<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrugsProblemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drugs_problems', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('patient_case_id');
            $table->string('drug_name')->nullable();
            $table->string('what_happened')->nullable();
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
        Schema::dropIfExists('drugs_problems');
    }
}
