<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 8)
           ->create()
           ->each(function ($u) {
               $subscription = App\Subscription::inRandomOrder()->first();
               $u->subscription()->associate($subscription);
            });
    }
}
