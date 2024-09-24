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
        Book::create(["title" => "ドラえもん", "author" => "藤子・Ｆ・不二雄", "type_id" => 3, "user_id" => 1]);
        Book::create(["title" => "たけくらべ", "author" => "樋口一葉", "type_id" => 3, "user_id" => 1]);
        Book::create(["title" => "ダンジョン飯", "author" => "九井諒子", "type_id" => 3, "user_id" => 2]);
        Book::create(["title" => "宇治拾遺物語", "author" => "町田康", "type_id" => 3, "user_id" => 2]);
        Book::create(["title" => "ヒトラーとナチ・ドイツ", "author" => "石田勇治", "type_id" => 4, "user_id" => 3]);
        Book::create(["title" => "猫とともに去りぬ", "author" => "ジャンニ・ロダーリ", "type_id" => 3, "user_id" => 3]);
        Book::create(["title" => "百年の孤独", "author" => "ガルシア・マルケス", "type_id" => 1, "user_id" => 3]);
        Book::create(["title" => "Java入門", "author" => "株式会社フレアリンク", "type_id" => 1, "user_id" => 1]);
        Book::create(["title" => "他者と働く", "author" => "宇田川元一", "type_id" => 2, "user_id" => 3]);
        Book::create(["title" => "失なわれた時を求めて", "author" => "マルセル・プルースト", "type_id" => 2, "user_id" => 1]);
        Book::create(["title" => "庭", "author" => "小山田浩子", "type_id" => 2, "user_id" => 1]);
        Book::create(["title" => "ちょっと踊ったり すぐにかけだす", "author" => "古賀及子", "type_id" => 2, "user_id" => 2]);
        Book::create(["title" => "告白", "author" => "町田康", "type_id" => 2, "user_id" => 1]);
        Book::create(["title" => "苦海浄土", "author" => "石牟礼道子", "type_id" => 1, "user_id" => 1]);
        Book::create(["title" => "岸辺露伴は動かない", "author" => "荒木飛呂彦", "type_id" => 3, "user_id" => 3]);
        Book::create(["title" => "禍いの科学", "author" => "ポール・A・オフィット", "type_id" => 2, "user_id" => 3]);
        Book::create(["title" => "過去のない男", "author" => "アキ・カウリスマキ", "type_id" => 7, "user_id" => 2]);
        Book::create(["title" => "マッドマックス 怒りのデスロード", "author" => "ジョージ・ミラー", "type_id" => 6, "user_id" => 1]);
        Book::create(["title" => "象の旅", "author" => "ジョゼ・サラマーゴ", "type_id"=> 1, "user_id" => 2]);
        Book::create(["title" => "ゲド戦記", "author" => "アーリュラ・K・ル=グウィン", "type_id" => 1, "user_id" => 3]);
        Book::create(["title" => "珈琲時間", "author" => "豊田徹也", "type_id" => 3, "user_id" => 2]);
        
        for ($i = 1; $i <= 100; $i++) {
            Book::create([
                "title" => "テスト パート" . $i,
                "author" => "テスター",
                "type_id" => rand(1, 8), 
                "user_id" => rand(1, 3), 
            ]);
        }
    }
}
