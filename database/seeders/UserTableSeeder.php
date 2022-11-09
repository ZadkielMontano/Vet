<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' =>'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'cedula'=>'552982371',
            'address'=>'Heroes Técamac',
            'phone'=>'6153215',
            'role'=>'admin',
        ]);
        User::create([
            'name' =>'Client 1',
            'email' => 'cliente@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'role'=>'cliente',
        ]);
        User::create([
            'name' =>'Vet 1',
            'email' => 'veterinario@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'role'=>'veterinario',
        ]);


        User::factory()
            ->count(10)
            ->state(['role' => 'cliente'])
            ->create();
    }
}
