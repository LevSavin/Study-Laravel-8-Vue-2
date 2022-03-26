<?php

use Carbon\Carbon;
use App\Models\Status;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Status::insert([
            ['id' => 1, 'name' => 'new', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 2, 'name' => 'arrived_at_destination_country', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 3, 'name' => 'customs_clearance', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 4, 'name' => 'issued_by_customs', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 5, 'name' => 'delivery_to_the_receiver', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 6, 'name' => 'delivered', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statuses');
    }
}
