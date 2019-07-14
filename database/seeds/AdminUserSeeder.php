<?php

use Illuminate\Database\Seeder;
use App\Admin;
use Faker\Factory;


class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(Admin::class,1)->create();
    }
}
