<?php

use Illuminate\Database\Seeder;

class LoanTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loan_types')->insert([
            'name' => 'Bridging - property'
        ]);
        DB::table('loan_types')->insert([
            'name' => 'Bridging - company'
        ]);
        DB::table('loan_types')->insert([
            'name' => 'Development Finance'
        ]);
        DB::table('loan_types')->insert([
            'name' => 'Other'
        ]);
    }
}
