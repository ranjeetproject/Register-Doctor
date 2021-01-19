<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_entries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('region_id');
            $table->string('invoice_number',100);
            $table->date('month');
            $table->decimal('basic_amount', 12, 2);
            $table->decimal('total_amount', 12, 2);
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('sales_entries');
    }
}
