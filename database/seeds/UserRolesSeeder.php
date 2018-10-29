<?php

use Illuminate\Database\Seeder;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_role')->insert([
            'name' => 'admin'
        ]);
        DB::table('user_role')->insert([
            'name' => 'user_role'
        ]);
    }
}
