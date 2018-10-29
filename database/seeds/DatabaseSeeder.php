<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserRolesSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(currencyTableSeeder::class);
        $this->call(LoanTypeSeeder::class);
        $this->call(SecurityTypeSeeder::class);
    }
}
