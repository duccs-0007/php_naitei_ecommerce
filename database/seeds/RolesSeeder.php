<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name' => 'Overlord', 
            'slug' => 'admin',
            'permissions' => [
                'users.resource' => true,
            ]
        ]);
        $manager = Role::create([
            'name' => 'Locallord', 
            'slug' => 'manager',
            'permissions' => [
                'users.index' => true,
                'users.show' => true,
                'users.edit' => true,
                'users.update' => true,
            ]
        ]);
        $customer = Role::create([
            'name' => 'Customer', 
            'slug' => 'customer',
            'permissions' => [
                'users.show' => true,
                'users.edit' => true,
                'users.update' => true,
            ]
        ]);
    }
}
