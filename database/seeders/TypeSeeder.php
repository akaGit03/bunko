<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::create(["name" => "ハードカバー"]);
        Type::create(["name" => "文庫"]);
        Type::create(["name" => "マンガ"]);
        Type::create(["name" => "新書"]);
        Type::create(["name" => "雑誌"]);
        Type::create(["name" => "Blue-Ray"]);
        Type::create(["name" => "DVD"]);
        Type::create(["name" => "その他"]);
    }
}
