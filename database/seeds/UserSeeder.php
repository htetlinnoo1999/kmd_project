<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@rainbow.com',
            'password' => bcrypt('asdf1234'),
            'role' => 'Super Admin'
        ]);
    }
}
