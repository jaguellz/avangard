<?php

namespace Database\Seeders;

use Faker;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class OrdersProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 1000;

        $products = Product::get();
        $orders = Order::get();

        foreach ($orders as $order)
        {
            $pLimit = rand(1, Product::count());
            for ($product = 1; $product <= $pLimit; $product += rand(1, 49))
            {
                $count = rand(1, 100);
                $order->products()->attach($product, ['count' => $count]);
            }
        }
    }
}
