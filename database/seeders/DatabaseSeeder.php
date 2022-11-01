<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        \App\Models\User::factory()->create([
            'name' => 'agung',
            'email' => 'agung@gmail.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
