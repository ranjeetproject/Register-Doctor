<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyTaskDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_task_docs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('monthly_task_id');
            $table->string('document');

            $table->foreign('monthly_task_id')
                  ->references('id')->on('monthly_tasks')
                  ->onDelete('cascade');

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
        Schema::dropIfExists('monthly_task_docs');
    }
}
