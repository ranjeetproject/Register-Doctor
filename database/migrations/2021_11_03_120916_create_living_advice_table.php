<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivingAdviceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('living_advice', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('heading')->nullable();
            $table->string('posted_by')->nullable();
            $table->string('news_type')->nullable();
            $table->text('content')->nullable();
            $table->text('slug')->nullable();
            $table->text('sort_content')->nullable();
            $table->string('slide_status',2)->default(0);
            $table->string('image',100)->nullable();
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
        Schema::dropIfExists('living_advice');
    }
}
