<?php

use Illuminate\Database\Seeder;

class IncludesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\AboutService::class, 3)->create();
        factory(App\Album::class, 8)->create();
        factory(App\Availability::class, 1)->create();
        factory(App\BranchBody::class, 3)->create();
        factory(App\Chef::class, 4)->create();
        factory(App\OurServicesBody::class, 4)->create();
        factory(App\Statistic::class, 4)->create();
        factory(App\SlideMenu::class, 12)->create();
    }
}
