<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'id' => '1',
                'full_name' => 'Claudia Christensen',
                'email' => 'claudia@gmail.com',
                'password' => '1234',
                'address' => 'siempreviva 123',
                'city' => 'Springfield',
                'phone' => '01645362748'
            ]
        );

        DB::table('users')->insert(
            [
                'id' => '2',
                'full_name' => 'Daniel',
                'email' => 'daniel@gmail.com',
                'password' => '1234',
                'address' => 'valencia 123',
                'city' => 'Valencia',
                'phone' => '3463632748'
            ]
        );

        DB::table('users')->insert(
            [
                'id' => '3',
                'full_name' => 'Ana',
                'email' => 'ana@gmail.com',
                'password' => '1234',
                'address' => 'andalucia 123',
                'city' => 'Sevilla',
                'phone' => '344432748'
            ]
            );
    }
}
