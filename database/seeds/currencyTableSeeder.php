<?php

use Illuminate\Database\Seeder;

class currencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currency')->insert([
            'abbv' => 'USD',
            'name' => 'Dollar'
        ]);
        DB::table('currency')->insert([
            'abbv' => 'EUR',
            'name' => 'Euro'
        ]);
        DB::table('currency')->insert([
            'abbv' => 'GBP',
            'name' => 'Sterling Pounds'
        ]);
    }
}
