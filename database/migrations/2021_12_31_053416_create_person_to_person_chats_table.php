<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonToPersonChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_to_person_chats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('p_id')->nullable();
            $table->string('d_id')->nullable();
            $table->string('ph_id')->nullable();
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
        Schema::dropIfExists('person_to_person_chats');
    }
}
