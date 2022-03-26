<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaybillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waybills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('master_id');
            $table->unsignedBigInteger('receiver_id');
            $table->unsignedBigInteger('sender_id');
            $table->string('number');
            $table->timestamps();

            $table->foreign('master_id')
                ->references('id')->on('masters')
                ->onDelete('cascade');

            $table->foreign('receiver_id')
                ->references('id')->on('receivers')
                ->onDelete('cascade');

            $table->foreign('sender_id')
                ->references('id')->on('senders')
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
        Schema::dropIfExists('waybills');
    }
}
