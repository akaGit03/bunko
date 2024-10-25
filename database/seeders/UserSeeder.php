<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'ルーラ',
            'email' => 'lu-la@example.com',
            'password' => Hash::make('lu-latheuma'), // パスワードをハッシュ化
            'admin' => 1,
        ]);
        User::create([
            'name' => 'ショーン',
            'email' => 'shaun@example.com',
            'password' => Hash::make('shaunthesheep'),
        ]);

        User::create([
            'name' => 'ビッツァー',
            'email' => 'bitzer@example.com',
            'password' => Hash::make('bitzerthedog'),
        ]);

        User::create([
            'name' => 'ティミー',
            'email' => 'timmy@example.com',
            'password' => Hash::make('timmythesheep'),
        ]);

        User::create([
            'name' => 'ゲストユーザー',
            'email' => 'guest@example.com',
            'password' => Hash::make('guest'),
        ]);
    }
}
