<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name'=>'user',
            'email'=>'user@gmail.com',
            'password'=>'user12345'
        ]);
        Admin::factory()->create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>'admin12345'
        ]);
    }
}
