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
        $this->call(UserTableSeeder::class);
        // $this->call(NavBarTableSeeder::class);
        // $this->call(HomeTableSeeder::class);
        // $this->call(BasicDetailTableSeeder::class);
        // $this->call(ContactTableSeeder::class);
        // $this->call(AboutTableSeeder::class);
        // $this->call(MenuTableSeeder::class);
        // $this->call(DishTableSeeder::class);
        // $this->call(IncludesTableSeeder::class);
    }
}
