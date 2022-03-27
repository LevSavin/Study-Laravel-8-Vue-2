<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkTimesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for( $i = 8 ; $i < 19; $i++ )
        DB::table('worktimes')->insert([
            'date' => '2022-03-27',
            'time' => "{$i}:00:00",
        ]);
    }
}
