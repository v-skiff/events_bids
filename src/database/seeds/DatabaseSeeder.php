<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Event::class, 15)->create();
        factory(\App\Bid::class, 100)->create();
    }
}
