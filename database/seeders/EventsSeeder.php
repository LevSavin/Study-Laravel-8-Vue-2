<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for( $i = 0; $i < 5; $i++ )  {
            DB::table('events')->insert([
                'name' => $faker->name,
                'lastname' => $faker->lastName,
                'phone'=>$faker->phoneNumber,
                'service_id'=>array_rand(Service::all()->pluck('id')->toArray()),
                'datetime'=> "2022-04-26 1{$i}:00:00",
                'master_id'=>User::where('email','ivan@gmail.com')->value('id'),
            ]);
        }
    }
}
