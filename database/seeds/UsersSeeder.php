<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

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
        $customer = Role::where('slug', 'customer')->first();

        $user1 = User::create([
            'name' => 'Admin', 
            'email' => 'admin1@email.dev',
            'password' => bcrypt('123456'),
            'address' => 'Mars'
        ]);
        $user1->roles()->attach($admin);

        $user2 = User::create([
            'name' => 'Manager 1', 
            'email' => 'mg2@email.dev',
            'password' => bcrypt('123456'),
            'address' => 'Venus'
        ]);
        $user2->roles()->attach($manager);

        for($i = 3; $i<20; $i++){
            $user3 = User::create([
                'name' => 'Customer '.($i-2), 
                'email' => 'ct'.($i-2).'@email.dev',
                'password' => bcrypt('123456'),
                'address' => 'Sun*'
            ]);
            $user3->roles()->attach($customer);
        }
    }
}
