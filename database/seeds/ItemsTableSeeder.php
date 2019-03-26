<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Item;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		factory(Item::class,3)->create();
    }
}
