<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->unique();
            $table->tinyInteger('customer_pick_up')->default('0')->comment('0:Inactive, 1:Active');
            $table->tinyInteger('local_delivery')->default('0')->comment('0:Inactive, 1:Active');
            $table->tinyInteger('posts_within_uk')->default('0')->comment('0:Inactive, 1:Active');
            $table->tinyInteger('sends_international')->default('0')->comment('0:Inactive, 1:Active');
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
        Schema::dropIfExists('delivery_options');
    }
}
