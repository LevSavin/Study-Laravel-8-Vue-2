<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            ['Стрижка женская', 1000],
            ['Стрижка мужская', 700],
            ['Укладка бороды', 700],
            ['Легкая укладка', 800],
        ];

        foreach ($services as $service)  {
            DB::table('services')->insert([
                'name' => $service[0],
                'description' => null,
                'price' => $service[1],
                'user_id'=>User::where('email','ivan@gmail.com')->value('id'),
                'interval'=>'01:00:00',
            ]);
        }

    }
}
