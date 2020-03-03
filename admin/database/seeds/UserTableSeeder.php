<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $data =  [
        'name'=>'Admin',
        'email' => 'admin@admin.com',
        'email_verified_at' => now(),
        'password'=>12345678,
        'phone' => '01012345678',
        'country' => 'Egypt',
        'role' => 'admin',

      ];
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'email_verified_at' => $data['email_verified_at'],
        'password' =>Hash::make($data['password']),
        'remember_token' =>Str::random(10),
        'country' => $data['country'] ,
        'phone' => $data['phone'] ,
        'role' => $data['role'] ,

      ]);
    }
}
