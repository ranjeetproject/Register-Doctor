<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescription', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('doc_id');
            $table->bigInteger('p_id');
            $table->string('case_no');
            $table->string('guardian_name');
            $table->string('upn');
            $table->string('drug');
            $table->string('dose');
            $table->string('frequency');
            $table->string('route');
            $table->string('duration');
            $table->string('comments');
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
        Schema::dropIfExists('prescriptions');
    }
}
