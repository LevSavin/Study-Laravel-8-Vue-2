<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Ivan',
            'lastname' => 'Ivanov',
            'patronymic' => 'Jovanovich',
            'email' => 'ivan@gmail.com',
            'phone' => '+79255676787',
            'profession' => 'tattoo-master',
            'password' => Hash::make('12345678'),
        ]);
    }
}
