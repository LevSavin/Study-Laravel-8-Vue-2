<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('time_id')
            ->constrained('worktimes')
            ->cascadeOnDelete();
            $table->string('name');
            $table->string('phone');
            $table->foreignId('service_id')
                ->constrained('services')
                ->cascadeOnDelete();
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
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropForeign('time_id');
            $table->dropColumn('time_id');
            $table->dropForeign('service_id');
            $table->dropColumn('service_id');
        });
        Schema::dropIfExists('appointments');
    }
}
