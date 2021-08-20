<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThumbsUpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thumbs_ups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('doc_name');
            $table->string('doc_speciality');
            $table->string('country');
            $table->string('city');
            $table->string('email');
            $table->longText('comment')->nullable();
            $table->longText('opinion_leader')->nullable();
            $table->string('created_by');
            // $table->string('max_share')
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
        Schema::dropIfExists('thumbs_ups');
    }
}
