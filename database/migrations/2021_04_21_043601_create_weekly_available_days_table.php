<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeeklyAvailableDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weekly_available_days', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->enum('day', ['monday','tuesday','wednesday','thursday','friday','saturday','sunday'])->nullable();
            $table->tinyInteger('num_val_for_day')->default('0')->comment('1:monday, 2:tuesday,3:wednesday,4:thursday,5:friday,6:saturday,7:sunday');
            $table->time('from_time');
            $table->time('to_time');
            $table->tinyInteger('status')->default('1')->comment('1:active, 2:inactive');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weekly_available_days');
    }
}
