<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
//            $table->foreignId('client_id')
//                ->constrained('clients')
//                ->cascadeOnDelete();
//            $table->foreignId('user_id')
//                ->constrained('users')
//                ->cascadeOnDelete();
//            $table->timestamps();
//            $table->foreignId('service_id')
//                ->constrained('services')
//                ->cascadeOnDelete();
            $table->string('firstname');
            $table->string('lastname')->nullable();
            $table->integer('user_id');
            $table->string('phone');
            $table->integer('service_id');
            $table->integer('status')->default('0');
            $table->dateTime('datetime');
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
        Schema::dropIfExists('events');
    }
}
