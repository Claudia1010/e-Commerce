<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(
            [
                'id' => '1',
                'name' => 'user'
            ]
        );

        DB::table('roles')->insert(
            [
                'id' => '2',
                'name' => 'admin'
            ]
        );

        DB::table('roles')->insert(
            [
                'id' => '3',
                'name' => 'superadmin'
            ]
        );
    }
}
