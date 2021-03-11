<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePharmacyOpeningTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacy_opening_times', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->unsignedBigInteger('user_id')->unique();

            $table->tinyInteger('monday')->default('0')->comment('1:active, 0:inactive');
            $table->time('monday_opening_time');
            $table->time('monday_closing_time');

            $table->tinyInteger('tuesday')->default('0')->comment('1:active, 0:inactive');
            $table->time('tuesday_opening_time');
            $table->time('tuesday_closing_time');

            $table->tinyInteger('wednesday')->default('0')->comment('1:active, 0:inactive');
            $table->time('wednesday_opening_time');
            $table->time('wednesday_closing_time');

            $table->tinyInteger('thursday')->default('0')->comment('1:active, 0:inactive');
            $table->time('thursday_opening_time');
            $table->time('thursday_closing_time');

            $table->tinyInteger('friday')->default('0')->comment('1:active, 0:inactive');
            $table->time('friday_opening_time');
            $table->time('friday_closing_time');

            $table->tinyInteger('saturday')->default('0')->comment('1:active, 0:inactive');
            $table->time('saturday_opening_time');
            $table->time('saturday_closing_time');

            $table->tinyInteger('sunday')->default('0')->comment('1:active, 0:inactive');
            $table->time('sunday_opening_time');
            $table->time('sunday_closing_time');

            $table->text('notes')->nullable();

            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');


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
        Schema::dropIfExists('pharmacy_opening_times');
    }
}
