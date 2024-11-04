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
    	Book::create(["title" => "フランケンシュタイン", "author" => "メアリー・シェリー", "type_id" => 2, "user_id" => 1]);
        Book::create(["title" => "吾輩は猫である", "author" => "夏目漱石", "type_id" => 2, "user_id" => 1]);
    	Book::create(["title" => "種の起源", "author" => "チャールズ・ダーウィン", "type_id" => 2, "user_id" => 1]);
    	Book::create(["title" => "すべての、青いものたちの", "author" => "ホン・グン", "type_id" => 1, "user_id" => 1]);
    	Book::create(["title" => "牛乳時間", "author" => "十世田哲也", "type_id" => 4, "user_id" => 1]);
    	Book::create(["title" => "ファーブル昆虫記　２巻", "author" => "ジャン・アンリ・ファーブル", "type_id" => 1, "user_id" => 1]);
        
    	Book::create(["title" => "ゴリオ爺さん", "author" => "オノレ・ド・バルザック", "type_id" => 1, "user_id" => 2]);
    	Book::create(["title" => "モルグ街の殺人", "author" => "エドガー・ラン・ポー", "type_id" => 2, "user_id" => 2]);
    	Book::create(["title" => "暴慢と善良", "author" => "辻山実月", "type_id" => 2, "user_id" => 2]);
    	Book::create(["title" => "羊の旅", "author" => "ホセ・スラマーゴ", "type_id"=> 1, "user_id" => 2]);
    	Book::create(["title" => "アトランティス飯　1巻", "author" => "十井良子", "type_id" => 4, "user_id" => 2]);
    	Book::create(["title" => "アトランティス飯　2巻", "author" => "十井良子", "type_id" => 4, "user_id" => 2]);
    	Book::create(["title" => "アトランティス飯　3巻", "author" => "十井良子", "type_id" => 4, "user_id" => 2]);
    	Book::create(["title" => "アトランティス飯　4巻", "author" => "十井良子", "type_id" => 4, "user_id" => 2]);
    	Book::create(["title" => "アトランティス飯　5巻", "author" => "十井良子", "type_id" => 4, "user_id" => 2]);
    	Book::create(["title" => "マッドモックス 怒りのヘブンロード", "author" => "ジョージ・モラー", "type_id" => 7, "user_id" => 2]);
    	
        Book::create(["title" => "二体", "author" => "柳爾欣", "type_id" => 1, "user_id" => 3]);
    	Book::create(["title" => "Java入門", "author" => "ジャバ・ハナコ", "type_id" => 1, "user_id" => 3]);
    	Book::create(["title" => "他者と踊る", "author" => "江田川玄一", "type_id" => 5, "user_id" => 3]);
    	Book::create(["title" => "ブドウページ　2008年5月号", "author" => "株式会社ブドウページ", "type_id" => 6, "user_id" => 3]);
    	Book::create(["title" => "北洋経済　2024年9月号", "author" => "日本北洋経済新聞社", "type_id" => 6, "user_id" => 3]);
    	Book::create(["title" => "昨日のない男", "author" => "オキ・コウラスマキ", "type_id" => 8, "user_id" => 3]);
    	Book::create(["title" => "ひつじのきもち　2020年3月号", "author" => "ボネッソコーポレーション", "type_id" => 6, "user_id" => 3]);
    	Book::create(["title" => "ひつじのきもち　2022年10月号", "author" => "ボネッソコーポレーション", "type_id" => 6, "user_id" => 3]);
    	
    	Book::create(["title" => "ぼりとぼら", "author" => "おおかわれえこ/こむらよりこ", "type_id" => 3, "user_id" => 4]);
    	Book::create(["title" => "あちらのワンピース", "author" => "ひがしまきこやこ", "type_id" => 3, "user_id" => 4]);
    	Book::create(["title" => "オズのまほうつかい", "author" => "ヴィクター・フレミング", "type_id" => 6, "user_id" => 4]);
        Book::create(["title" => "ペロ戦記　上巻", "author" => "オーシュラ・L・ロ＝グイン", "type_id" => 3, "user_id" => 4]);
    	Book::create(["title" => "ペロ戦記　中巻", "author" => "オーシュラ・L・ロ＝グイン", "type_id" => 3, "user_id" => 4]);
    	Book::create(["title" => "ペロ戦記　下巻", "author" => "オーシュラ・L・ロ＝グイン", "type_id" => 3, "user_id" => 4]);

        for ($i = 1; $i <= 250; $i++) {
            Book::create([
                "title" => "テスト No." . $i,
                "author" => "ライター" . chr(mt_rand(65,90)),
                "type_id" => mt_rand(1, 9), 
                "user_id" => mt_rand(1, 4), 
            ]);
        }
    }
}
