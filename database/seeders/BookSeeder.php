<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 200; $i++) {
            Book::create([
                "title" => "テスト No." . $i,
                "author" => "ライター" . chr(mt_rand(65,90)),
                "type_id" => mt_rand(1, 9), 
                "user_id" => mt_rand(1, 4), 
            ]);
        }
    }
}
