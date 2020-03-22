<?php

use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\ContactU::create([
          'title' => 'Drop us a line',
          'content' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.',
          'description' => 'Contact us',
          'form_title' => 'Contact us',
          'form_description' => 'Drop us a line',
          'form_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
          'facebook' => 'https://www.facebook.com',
          'twitter' => 'https://www.twitter.com',
          'youtube' => 'https://www.youtube.com',
          'instagram' => 'https://www.instagram.com',
          'place' => 'Brooklyn',
          'address' => '32 Radwan El-Tayeb, Giza Governorate, Egypt',
          'map_directions' => 'https://www.example.com',
        ]);
    }
}
