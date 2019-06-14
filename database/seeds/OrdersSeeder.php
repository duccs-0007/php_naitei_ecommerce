<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Models\Product;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = User::whereHas(
            'roles', function($q){
                $q->where('name', 'Customer');
            }
        )->get();
        $faker = Faker\Factory::create();
        foreach($customers as $customer)
        {
            $total_price = 0.0;
            for($i=0; $i<5; $i++){
                $product = Product::where('id', rand(1,20))->get()->first();
                $total_price += $product->price;
            }
            DB::table('orders')->insert([
                'address' => 'Sun*',
                'slug' => uniqid(),
                'order_total' => $total_price,
                'note' => $faker->text($maxNbChars = 100),
                'accepted' => rand(0,1),
                'user_id' => $customer->id
            ]);
        }
    }
}
