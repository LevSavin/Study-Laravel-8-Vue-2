<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusWaybillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_waybill', function (Blueprint $table) {
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('waybill_id');
            $table->dateTime('datetime');

            $table->foreign('status_id')
                ->references('id')
                ->on('statuses')
                ->onDelete('cascade');

            $table->foreign('waybill_id')
                ->references('id')
                ->on('waybills')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_waybill');
    }
}
