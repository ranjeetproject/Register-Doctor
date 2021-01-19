<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->date('date')->nullable();
            // $table->decimal('timing')->nullable();
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->string('client_name')->nullable();
            $table->string('contact_person')->nullable();
            $table->tinyInteger('client_type')->nullable();
            $table->text('expense_description')->nullable();
            $table->decimal('expense_amount', 8, 2);
            $table->text('metting_description')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1:process, 2:accept, 3:reject');

            $table->foreign('user_id')
                  ->references('id')->on('users')
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
        Schema::dropIfExists('monthly_tasks');
    }
}
