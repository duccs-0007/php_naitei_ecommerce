<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Shoes',
                'product_id' => 1
            ],
            [
                'name' => 'Foods',
                'product_id' => 2
            ],
            [
                'name' => 'Hats',
                'product_id' => 3
            ]
        ]);
    }
}
