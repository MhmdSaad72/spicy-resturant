<?php

use Illuminate\Database\Seeder;

class NavBarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\NavBar::create([
          'home' => 'Home',
          'about' => 'About',
          'about_1' => 'About style 1',
          'about_2' => 'About style 2',
          'contact' => 'Contact',
          'contact_1' => 'Contact style 1',
          'contact_2' => 'Contact style 2',
          'menu' => 'Menu',
          'menu_1' => 'Menu style 1',
          'menu_2' => 'Menu style 2',
          'pages' => 'Pages',
        ]);
    }
}
