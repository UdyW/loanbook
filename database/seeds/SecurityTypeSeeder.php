<?php

use Illuminate\Database\Seeder;

class SecurityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('security_type')->insert([
            'name' => '1st Charge'
        ]);
        DB::table('security_type')->insert([
            'name' => '2nd Chargs'
        ]);
        DB::table('security_type')->insert([
            'name' => 'Personal Gurantee'
        ]);
        DB::table('security_type')->insert([
            'name' => 'Corporate Gurantee'
        ]);
        DB::table('security_type')->insert([
            'name' => 'Debenture'
        ]);
        DB::table('security_type')->insert([
            'name' => 'Other'
        ]);
    }
}
