<?php

use Illuminate\Database\Seeder;

class SubscriptionsProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subscriptions = App\Subscription::all();

        foreach($subscriptions as $subscription){            
            $num_of_apps = rand(1,5);

            for($i = 0; $i < $num_of_apps; $i++){
                $products = App\Product::inRandomOrder()->first();

                $subscription->apps()->attach($products);    
            }
        }
    }
}
