<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SubscriptionsTableSeeder::class,
            ProductTableSeeder::class,
            UsersTableSeeder::class,            
            SubscriptionsProductTableSeeder::class,
        ]);
    }
}
