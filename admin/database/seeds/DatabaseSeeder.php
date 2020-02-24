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
        // $this->call(UsersTableSeeder::class);
        $this->call(HomeTableSeeder::class);
        $this->call(BasicDetailTableSeeder::class);
        $this->call(ContactTableSeeder::class);
        $this->call(AboutTableSeeder::class);
        $this->call(IncludesTableSeeder::class);
    }
}
