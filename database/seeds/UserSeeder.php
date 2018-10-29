<?php

use Illuminate\Database\Seeder;
use App\UserRole;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = UserRole::where('name','admin')->first();
        $role_user = UserRole::where('name','user_role')->first();
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password'=>bcrypt('1234')
        ]);
        User::where('name','admin')->first()->userRole()->attach($role_admin);
        
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@admin.com',
            'password'=>bcrypt('1234')
        ]);
        User::where('name','user')->first()->userRole()->attach($role_user);
    }
}
