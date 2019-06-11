<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('slug', 'admin')->first();
        $manager = Role::where('slug', 'manager')->first();

        $user1 = User::create([
            'name' => 'Admin', 
            'email' => 'admin1@email.dev',
            'password' => bcrypt('123456')
        ]);
        $user1->roles()->attach($admin);

        $user2 = User::create([
            'name' => 'Manager 1', 
            'email' => 'mg2@email.dev',
            'password' => bcrypt('123456')
        ]);
        $user2->roles()->attach($manager);

        $user3 = User::create([
            'name' => 'Customer 1', 
            'email' => 'ct1@email.dev',
            'password' => bcrypt('123456')
        ]);
        $user2->roles()->attach($customer);
    }
}
