<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Models\Product;
use App\Order;
use Carbon\Carbon;

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
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        foreach($customers as $customer)
        {   
            $temp = $customer->id;
            $order = Order::create([
                'address' => 'Sun*',
                'slug' => uniqid(),
                'startday' => $dt->toDateString(),
                'dueday' => $dt->addWeek()->toDateString(),
                'order_total' => 0.0,
                'note' => $faker->text($maxNbChars = 100),
                'status' => 0,
                'user_id' => $customer->id
            ]);
            $total_price = 0.0;
            for( $i=1; $i <= 5; $i++){
                $product = Product::where('id', (($temp+$i) % 19)+1 )->get()->first();
                $order->products()->attach($product);
                $product_quantity = rand(1,3);
                $total_price += $product_quantity * $product->price;
                $order->products()
                    ->updateExistingPivot($product->id, [ 
                        'quantity' => $product_quantity 
                ]);
            }
            $order->update([
                'order_total' => $total_price
            ]);
        }
    }
}
