<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Gurez ID',
            'username' => 'Gurez',
            'email' => 'Sokini74@gmail.com',
            'profil' => null,
            'password' => bcrypt('123'),
            'role' => 1
        ]);
        User::create([
            'name' => 'Analia rose',
            'username' => 'Rose',
            'email' => 'Naniyakuza@gmail.com',
            'profil' => null,
            'password' => bcrypt('123'),
            'role' => 0
        ]);
    }
}
