<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'     => 'Administrator',
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'is_admin' => true,
        ]);

        User::create([
            'name'     => 'Peter',
            'username' => 'peter',
            'password' => Hash::make('peter'),
        ]);
        
        User::create([
            'name'     => 'Richard',
            'username' => 'richard',
            'password' => Hash::make('richard'),
        ]);
    }
}
